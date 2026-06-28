<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemen = Departemen::with('pengguna')->orderBy('id_departemen', 'desc')->paginate(10);
        return view('admin.crud_departemen.index', compact('departemen'));
    }

    public function create()
    {
        return view('admin.crud_departemen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|min:6|confirmed',
        ]);

        DB::beginTransaction();

        try {
            // 1. Simpan ke pengguna
            $pengguna = Pengguna::create([
                'email' => $request->email,
                'kata_sandi' => Hash::make($request->password),
                'peran' => 'departemen',
                'terdaftar_pada' => now(),
            ]);

            // 2. Simpan ke departemen (HANYA field yang ada)
            Departemen::create([
                'id_pengguna' => $pengguna->id_pengguna,
                'nama_departemen' => $request->nama,
                'status_aktif' => 'aktif', // ← PAKAI status_aktif
                // 'email' → HAPUS!
            ]);

            DB::commit();

            return redirect()->route('crud_departemen.index')
                ->with('success', 'Departemen berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambahkan departemen: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $departemen = Departemen::with('pengguna')->findOrFail($id);
        return view('admin.crud_departemen.edit', compact('departemen'));
    }

    public function update(Request $request, $id)
    {
        $departemen = Departemen::with('pengguna')->findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'nullable|min:6|confirmed',
        ]);

        DB::beginTransaction();

        try {
            // Update pengguna
            $pengguna = $departemen->pengguna;
            $pengguna->email = $request->email;
            if ($request->filled('password')) {
                $pengguna->kata_sandi = Hash::make($request->password);
            }
            $pengguna->save();

            // Update departemen
            $departemen->nama_departemen = $request->nama;
            // $departemen->email = $request->email; → HAPUS!
            $departemen->save();

            DB::commit();

            return redirect()->route('crud_departemen.index')
                ->with('success', 'Data departemen berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal mengupdate departemen: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $departemen = Departemen::with('pengguna')->findOrFail($id);
        return view('admin.crud_departemen.show', compact('departemen'));
    }

    public function destroy($id)
    {
        $departemen = Departemen::with('pengguna')->findOrFail($id);

        DB::beginTransaction();

        try {
            $departemen->delete();
            if ($departemen->pengguna) {
                $departemen->pengguna->delete();
            }
            DB::commit();

            return redirect()->route('crud_departemen.index')
                ->with('success', 'Departemen berhasil dihapus!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus departemen: ' . $e->getMessage());
        }
    }
}