<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $primaryKey = 'id_anggota';

    protected $fillable = [
        'id_pengguna',    
        'gambar_profil',
        'nama_lengkap',
        'nama_panggilan',
        'email',
        'nomor_wa',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'deskripsi_diri',
        'bidang_keahlian_utama',
        'url_youtube',
        'url_facebook',
        'url_instagram',
        'url_tiktok',
        'url_linktree',
        'url_blogger',
        'status_keaktifan',
        'dibuat_pada',
        'diperbarui_pada',
    ];

    // Relasi ke pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}