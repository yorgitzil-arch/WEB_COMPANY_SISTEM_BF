<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AnggotaController extends Controller
{
    // 1. READ: Tampilkan daftar Anggota
    public function index()
    {
        $anggotas = Anggota::orderBy('id_anggota', 'desc')->paginate(10);
        return view('admin.crud_anggota.index', compact('anggotas'));
    }

    // 2. CREATE: Tampilkan Form Tambah Anggota
    public function create()
    {
        return view('admin.crud_anggota.create');
    }

    // Proses Simpan Anggota Baru
   // Proses Simpan Anggota Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:anggota,email',
        ]);

        // Mengambil ID terakhir dari pengguna untuk digenerate secara otomatis
        $nextId = (\App\Models\Anggota::max('id_pengguna') ?? 0) + 1;

        // Hanya masukkan kolom yang ada di database kamu
        Anggota::create([
            'id_pengguna'  => $nextId, 
            'nama_lengkap' => $request->nama, 
            'email'        => $request->email,
            // Kolom 'kata_sandi' sudah dihapus dari sini agar tidak error lagi
        ]);

        return redirect()->route('crud_anggota.index')->with('success', 'Anggota baru berhasil ditambahkan!');
    }

    // 5. DETAIL: Menampilkan halaman detail anggota beserta seluruh tabel pendukungnya
    
    public function show($crud_anggotum)
    {
        // Tetap mencari anggota berdasarkan primary key model (id_pengguna)
        $anggota = Anggota::findOrFail($crud_anggotum);

        // PERBAIKAN: Mengubah parameter pencarian di tabel pendukung menggunakan 'id_anggota'
        $pengalaman = DB::table('pengalaman_anggota')->where('id_anggota', $crud_anggotum)->get();
        $keahlian   = DB::table('keahlian_anggota')->where('id_anggota', $crud_anggotum)->get();
        $sertifikat = DB::table('sertifikat_penghargaan')->where('id_anggota', $crud_anggotum)->get();
        $proyek_p   = DB::table('proyek_pribadi')->where('id_anggota', $crud_anggotum)->get();
        $video      = DB::table('video_proyek')->where('id_anggota', $crud_anggotum)->get();
        $ebook      = DB::table('ebook_anggota')->where('id_anggota', $crud_anggotum)->get();
        $proyek_l   = DB::table('proyek_lainnya')->where('id_anggota', $crud_anggotum)->get();

        return view('admin.crud_anggota.show', compact(
            'anggota', 'pengalaman', 'keahlian', 'sertifikat', 'proyek_p', 'video', 'ebook', 'proyek_l'
        ));
    }

    // 3. UPDATE: Halaman Edit Anggota
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin.crud_anggota.edit', compact('anggota'));
        // Di dalam Controller Anggota, method update()

    }

    // Proses Simpan Perubahan Edit Anggota
    // Proses Simpan Perubahan Edit Anggota
    // Menggunakan parameter $crud_anggotum agar sesuai dengan sistem resource Laravel
    public function update(Request $request, $crud_anggotum)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            // SOLUSI: Menambahkan nama kolom primary key asli ('id_pengguna') di akhir aturan unique
            'email' => 'required|email|unique:anggota,email,' . $crud_anggotum . ',id_pengguna',
        ]);

        // Cari data berdasarkan kolom id_pengguna
        // Ganti baris yang digarismerahi menjadi ini:
        $anggota = Anggota::findOrFail($crud_anggotum);
        
        // Menyelaraskan ke nama kolom database asli Anda (nama_lengkap)
        $anggota->nama_lengkap = $request->nama;
        $anggota->email = $request->email;
        $anggota->save();

        // Pastikan baris terakhir di method update() persis seperti ini:
        return redirect()->route('crud_anggota.index')->with('success', 'Data Anggota berhasil diperbarui!');
    }

    // 4. DELETE: Hapus Data Anggota
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('crud_anggota.index')->with('success', 'Akun Anggota berhasil dihapus!');
    }
}