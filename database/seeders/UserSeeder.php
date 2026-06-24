<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        
        $penggunaIds = [];
        
        // 1.1 Admin
        DB::table('pengguna')->insert([
            'id_pengguna' => 1,
            'email' => 'admin@bitforge.com',
            'kata_sandi' => Hash::make('password'),
            'peran' => 'admin',
            'terdaftar_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $penggunaIds['admin'] = 1;
        
        // 1.2 Keuangan
        DB::table('pengguna')->insert([
            'id_pengguna' => 2,
            'email' => 'keuangan@bitforge.com',
            'kata_sandi' => Hash::make('password'),
            'peran' => 'keuangan',
            'terdaftar_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $penggunaIds['keuangan'] = 2;
        
        // 1.3 Anggota 1
        DB::table('pengguna')->insert([
            'id_pengguna' => 3,
            'email' => 'anggota1@bitforge.com',
            'kata_sandi' => Hash::make('password'),
            'peran' => 'anggota',
            'terdaftar_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $penggunaIds['anggota1'] = 3;
        
      
        
        // 1.6 Departemen 1 - Software
        DB::table('pengguna')->insert([
            'id_pengguna' => 4,
            'email' => 'software@bitforge.com',
            'kata_sandi' => Hash::make('password'),
            'peran' => 'departemen',
            'terdaftar_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $penggunaIds['dept_software'] = 4;
        
        // 1.7 Departemen 2 - Robotics
        DB::table('pengguna')->insert([
            'id_pengguna' => 5,
            'email' => 'robotics@bitforge.com',
            'kata_sandi' => Hash::make('password'),
            'peran' => 'departemen',
            'terdaftar_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $penggunaIds['dept_robotics'] = 5;
        
        // 1.8 Departemen 3 - Jaringan
        DB::table('pengguna')->insert([
            'id_pengguna' => 6,
            'email' => 'jaringan@bitforge.com',
            'kata_sandi' => Hash::make('password'),
            'peran' => 'departemen',
            'terdaftar_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $penggunaIds['dept_jaringan'] = 6;
        
        // 1.9 Pelanggan 1
        DB::table('pengguna')->insert([
            'id_pengguna' => 7,
            'email' => 'pelanggan1@bitforge.com',
            'kata_sandi' => Hash::make('password'),
            'peran' => 'pelanggan',
            'terdaftar_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $penggunaIds['pelanggan1'] = 7;
        


        // ============================================
        // 2. INSERT KE TABEL admin
        // ============================================
        
        DB::table('admin')->insert([
            'id_admin' => 1,
            'id_pengguna' => $penggunaIds['admin'],
            'nama_lengkap' => 'Administrator Bitforge',
            'email' => 'admin@bitforge.com',
            'kata_sandi' => Hash::make('password'),
            'akses_validasi_proyek' => true,
            'akses_validasi_testimoni' => true,
            'akses_validasi_komentar' => true,
            'akses_validasi_konsultasi' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        // ============================================
        // 3. INSERT KE TABEL keuangan
        // ============================================
        
        DB::table('keuangan')->insert([
            'id_keuangan' => 1,
            'id_pengguna' => $penggunaIds['keuangan'],
            'nama_lengkap' => 'Finance Officer Bitforge',
            'email' => 'keuangan@bitforge.com',
            'kata_sandi' => Hash::make('password'),
            'akses_verifikasi_bukti' => true,
            'akses_kelola_pengeluaran' => true,
            'akses_kelola_komisi' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        // ============================================
        // 4. INSERT KE TABEL anggota
        // ============================================
        
        // Anggota 1 - Andi Pratama
        DB::table('anggota')->insert([
            'id_anggota' => 1,
            'id_pengguna' => $penggunaIds['anggota1'],
            'gambar_profil' => null,
            'nama_lengkap' => 'Andi Pratama',
            'nama_panggilan' => 'Andi',
            'email' => 'anggota1@bitforge.com',
            'nomor_wa' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 1, Bandung',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1998-05-15',
            'deskripsi_diri' => 'Fullstack Developer dengan pengalaman 5 tahun di Laravel dan React. Spesialisasi di backend development dan API.',
            'bidang_keahlian_utama' => 'Laravel Developer',
            'url_youtube' => 'https://youtube.com/@andipratama',
            'url_facebook' => 'https://facebook.com/andipratama',
            'url_instagram' => 'https://instagram.com/andipratama',
            'url_tiktok' => 'https://tiktok.com/@andipratama',
            'url_linktree' => 'https://linktr.ee/andipratama',
            'url_blogger' => 'https://andipratama.blogger.com',
            'status_keaktifan' => 'aktif',
            'dibuat_pada' => now(),
            'diperbarui_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // ============================================
        // 5. INSERT KE TABEL departemen
        // ============================================
        
        // Departemen 1 - Software
        DB::table('departemen')->insert([
            'id_departemen' => 1,
            'id_pengguna' => $penggunaIds['dept_software'],
            'nama_departemen' => 'Software Engineering',
            'deskripsi' => 'Departemen yang fokus pada pengembangan aplikasi berbasis web, mobile, dan desktop. Menggunakan teknologi modern seperti Laravel, React, dan Flutter.',
            'bidang_fokus' => 'Pengembangan Software, API, Database',
            'gambar_ikon' => null,
            'status_aktif' => 'aktif',
            'dibuat_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Departemen 2 - Robotics
        DB::table('departemen')->insert([
            'id_departemen' => 2,
            'id_pengguna' => $penggunaIds['dept_robotics'],
            'nama_departemen' => 'Robotics & Automation',
            'deskripsi' => 'Departemen yang mengembangkan solusi robotik dan otomasi industri. Mulai dari desain mekanik hingga kontrol sistem.',
            'bidang_fokus' => 'Robotika, Otomasi, Embedded System',
            'gambar_ikon' => null,
            'status_aktif' => 'aktif',
            'dibuat_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Departemen 3 - Jaringan
        DB::table('departemen')->insert([
            'id_departemen' => 3,
            'id_pengguna' => $penggunaIds['dept_jaringan'],
            'nama_departemen' => 'Network & Infrastructure',
            'deskripsi' => 'Departemen yang menangani infrastruktur jaringan, keamanan siber, dan solusi cloud computing untuk perusahaan.',
            'bidang_fokus' => 'Jaringan, Keamanan Siber, Cloud',
            'gambar_ikon' => null,
            'status_aktif' => 'aktif',
            'dibuat_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        // ============================================
        // 6. INSERT KE TABEL pelanggan
        // ============================================
        
        // Pelanggan 1 - PT Maju Jaya
        DB::table('pelanggan')->insert([
            'id_pelanggan' => 1,
            'id_pengguna' => $penggunaIds['pelanggan1'],
            'nama' => 'PT Maju Jaya',
            'email' => 'pelanggan1@bitforge.com',
            'nomor_wa' => '081234567893',
            'nama_perusahaan' => 'PT Maju Jaya',
            'dibuat_pada' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}