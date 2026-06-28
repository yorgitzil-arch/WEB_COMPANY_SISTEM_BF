<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminCrudController extends Controller
{
    // 1. READ: Tampilkan daftar Admin (Ini rute manage-admin.index)
    public function index()
    {
        $admins = Admin::orderBy('id_admin', 'desc')->paginate(10);
        return view('admin/crud_akun_admin.index', compact('admins'));
    }

    // 2. CREATE: Tampilkan Form Tambah (Ini rute manage-admin.create yang error tadi)
    public function create()
    {
        return view('admin/crud_akun_admin.create');
    }

    // Proses Simpan Admin Baru (manage-admin.store)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            // ID Pengguna otomatis dibuat unik agar tidak "Duplicate entry"
            'id_pengguna'  => (DB::table('admin')->max('id_pengguna') ?? 0) + 1, 
            'nama_lengkap' => $request->nama,
            'email'        => $request->email,
            'kata_sandi'   => Hash::make($request->password),
        ]);

        return redirect()->route('manage-admin.index')->with('success', 'Admin baru berhasil ditambahkan!');
    }

    // 3. UPDATE: Halaman Edit (manage-admin.edit)
    public function edit($id)
    {
        $adminData = Admin::findOrFail($id);
        return view('admin/crud_akun_admin.edit', compact('adminData'));
    }

    // Proses Simpan Perubahan Edit (manage-admin.update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email,' . $id . ',id_admin',
        ]);

        $admin = Admin::findOrFail($id);
        
        $admin->nama_lengkap = $request->nama;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $request->validate(['password' => 'min:6']);
            $admin->kata_sandi = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('manage-admin.index')->with('success', 'Data Admin berhasil diperbarui!');
    }

    // 4. DELETE: Hapus Data (manage-admin.destroy)
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('manage-admin.index')->with('success', 'Akun Admin berhasil dihapus!');
    }
}