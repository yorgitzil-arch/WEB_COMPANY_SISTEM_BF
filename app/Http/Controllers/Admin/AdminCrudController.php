<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminCrudController extends Controller
{
    // 1. READ: Tampilkan daftar Admin
    public function index()
    {
        $admins = Admin::with('pengguna')->orderBy('id_admin', 'desc')->paginate(10);
        return view('admin/crud_akun_admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin/crud_akun_admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email|unique:admin,email',
            'password' => 'required|min:6|confirmed',
        ]);

        DB::beginTransaction();

        try {
            $pengguna = Pengguna::create([
                'email' => $request->email,
                'kata_sandi' => Hash::make($request->password),
                'peran' => 'admin',
                'terdaftar_pada' => now(),
            ]);

            Admin::create([
                'id_pengguna' => $pengguna->id_pengguna, 
                'nama_lengkap' => $request->nama,
                'email' => $request->email,
                'kata_sandi' => Hash::make($request->password),
                'akses_validasi_proyek' => $request->akses_validasi_proyek ?? true,
                'akses_validasi_testimoni' => $request->akses_validasi_testimoni ?? true,
                'akses_validasi_komentar' => $request->akses_validasi_komentar ?? true,
                'akses_validasi_konsultasi' => $request->akses_validasi_konsultasi ?? true,
            ]);

            DB::commit();

            return redirect()->route('manage-admin.index')
                ->with('success', 'Admin baru berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambahkan admin: ' . $e->getMessage());
        }
    }

    // 3. UPDATE: Halaman Edit
    public function edit($id)
    {
        $admin = Admin::with('pengguna')->findOrFail($id);
        return view('admin/crud_akun_admin.edit', compact('admin'));
    }

    // Proses Update
    public function update(Request $request, $id)
    {
        $admin = Admin::with('pengguna')->findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email,' . $admin->id_pengguna . ',id_pengguna|unique:admin,email,' . $id . ',id_admin',
        ]);

        DB::beginTransaction();

        try {
            $pengguna = $admin->pengguna;
            $pengguna->email = $request->email;
            if ($request->filled('password')) {
                $request->validate(['password' => 'min:6|confirmed']);
                $pengguna->kata_sandi = Hash::make($request->password);
            }
            $pengguna->save();
            $admin->nama_lengkap = $request->nama;
            $admin->email = $request->email;
            if ($request->filled('password')) {
                $admin->kata_sandi = Hash::make($request->password);
            }
            $admin->akses_validasi_proyek = $request->akses_validasi_proyek ?? false;
            $admin->akses_validasi_testimoni = $request->akses_validasi_testimoni ?? false;
            $admin->akses_validasi_komentar = $request->akses_validasi_komentar ?? false;
            $admin->akses_validasi_konsultasi = $request->akses_validasi_konsultasi ?? false;
            $admin->save();

            DB::commit();

            return redirect()->route('manage-admin.index')
                ->with('success', 'Data Admin berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal mengupdate admin: ' . $e->getMessage());
        }
    }

    // 4. DELETE: Hapus Data
    public function destroy($id)
    {
        $admin = Admin::with('pengguna')->findOrFail($id);

        DB::beginTransaction();

        try {
            $admin->delete();
            DB::commit();

            return redirect()->route('manage-admin.index')
                ->with('success', 'Akun Admin berhasil dihapus!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus admin: ' . $e->getMessage());
        }
    }
}