<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    // 1. READ: Tampilkan daftar Departemen
    public function index()
    {
        $departemens = Departemen::orderBy('id_departemen', 'desc')->paginate(10);
        return view('admin.crud_departemen.index', compact('departemens'));
    }

    // 2. CREATE: Tampilkan Form Tambah Departemen
    public function create()
    {
        return view('admin.crud_departemen.create');
    }

    // Proses Simpan Departemen Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // FIX: Menyertakan id_pengguna dari admin yang sedang login
        Departemen::create([
            'nama_departemen' => $request->nama_departemen,
            'deskripsi'       => $request->deskripsi,
            'id_pengguna'     => auth()->user()->id_pengguna, 
        ]);

        return redirect()->route('crud_departemen.index')->with('success', 'Departemen baru berhasil ditambahkan!');
    }

    // DETAIL: Tampilkan detail khusus 1 departemen (Sesuai tugas poin 5)
    public function show($id)
    {
        $departemen = Departemen::findOrFail($id);
        return view('admin.crud_departemen.show', compact('departemen'));
    }

    // 3. UPDATE: Halaman Edit Departemen
    public function edit($id)
    {
        $departemen = Departemen::findOrFail($id);
        return view('admin.crud_departemen.edit', compact('departemen'));
    }

    // Proses Simpan Perubahan Edit Departemen
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $departemen = Departemen::findOrFail($id);
        $departemen->nama_departemen = $request->nama_departemen;
        $departemen->deskripsi = $request->deskripsi;
        $departemen->save();

        return redirect()->route('crud_departemen.index')->with('success', 'Data Departemen berhasil diperbarui!');
    }

    // 4. DELETE: Hapus Data Departemen
    public function destroy($id)
    {
        $departemen = Departemen::findOrFail($id);
        $departemen->delete();

        return redirect()->route('crud_departemen.index')->with('success', 'Departemen berhasil dihapus!');
    }
}