<?php

namespace App\Http\Controllers\Admin;  // ← NAMESPACE ADMIN!

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::with('pengguna')->orderBy('id_anggota', 'desc')->paginate(10);
        return view('admin.crud_anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('admin.crud_anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email|unique:anggota,email',
            'password' => 'required|min:6|confirmed',
        ]);

        DB::beginTransaction();

        try {
            // 1. Simpan ke pengguna
            $pengguna = Pengguna::create([
                'email' => $request->email,
                'kata_sandi' => Hash::make($request->password),
                'peran' => 'anggota',
                'terdaftar_pada' => now(),
            ]);

            // 2. Simpan ke anggota (HANYA field yang ada di tabel)
            Anggota::create([
                'id_pengguna' => $pengguna->id_pengguna,
                'nama_lengkap' => $request->nama,
                'email' => $request->email,
                'status_keaktifan' => 'aktif',
            ]);

            DB::commit();

            return redirect()->route('crud_anggota.index')
                ->with('success', 'Anggota berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambahkan anggota: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $anggota = Anggota::with('pengguna')->findOrFail($id);
        return view('admin.crud_anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $anggota = Anggota::with('pengguna')->findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email,' . $anggota->id_pengguna . ',id_pengguna|unique:anggota,email,' . $id . ',id_anggota',
            'password' => 'nullable|min:6|confirmed',
        ]);

        DB::beginTransaction();

        try {
            // Update pengguna
            $pengguna = $anggota->pengguna;
            $pengguna->email = $request->email;
            if ($request->filled('password')) {
                $pengguna->kata_sandi = Hash::make($request->password);
            }
            $pengguna->save();

            // Update anggota (HANYA field yang ada)
            $anggota->nama_lengkap = $request->nama;
            $anggota->email = $request->email;
            $anggota->save();

            DB::commit();

            return redirect()->route('crud_anggota.index')
                ->with('success', 'Data anggota berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal mengupdate anggota: ' . $e->getMessage());
        }
    }

   public function show($id)
{
    $anggota = Anggota::with('pengguna')->findOrFail($id);
    $pengalaman = DB::table('pengalaman_anggota')->where('id_anggota', $id)->get();
    $keahlian = DB::table('keahlian_anggota')->where('id_anggota', $id)->get();
    $sertifikat = DB::table('sertifikat_penghargaan')->where('id_anggota', $id)->get();
    $proyek_p = DB::table('proyek_pribadi')->where('id_anggota', $id)->get();
    $video = DB::table('video_proyek')->where('id_anggota', $id)->get();
    $ebook = DB::table('ebook_anggota')->where('id_anggota', $id)->get();
    $proyek_l = DB::table('proyek_lainnya')->where('id_anggota', $id)->get();

    return view('admin.crud_anggota.show', compact(
        'anggota', 'pengalaman', 'keahlian', 'sertifikat', 'proyek_p', 'video', 'ebook', 'proyek_l'
    ));
}

    public function destroy($id)
    {
        $anggota = Anggota::with('pengguna')->findOrFail($id);

        DB::beginTransaction();

        try {
            $anggota->delete();
            if ($anggota->pengguna) {
                $anggota->pengguna->delete();
            }
            DB::commit();

            return redirect()->route('crud_anggota.index')
                ->with('success', 'Anggota berhasil dihapus!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus anggota: ' . $e->getMessage());
        }
    }
}