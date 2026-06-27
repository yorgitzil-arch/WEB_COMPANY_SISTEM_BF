<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    
    // 1. Ubah primary key ke id_pengguna sesuai struktur error database kamu
    protected $primaryKey = 'id_pengguna'; 
    
    // Jika id_pengguna bukan auto-incrementing integer (misal kamu isi manual/string), matikan ini:
    // public $incrementing = false; 

    protected $fillable = [
        'id_pengguna', // Tambahkan ini agar bisa diisi saat Anggota::create
        'nama_lengkap',
        'email',
        'kata_sandi',
        'id_sesi',
        'terdaftar_pada',
        'terakhir_login',
    ];
    
}