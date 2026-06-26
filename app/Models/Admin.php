<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';

    public $timestamps = true; // Aktifkan karena di DB kamu ada created_at & updated_at

    // Pastikan semua kolom yang mau diinput ada di dalam array ini!
    protected $fillable = [
        'id_pengguna', 
        'nama_lengkap', 
        'email',
        'kata_sandi',
        'akses_validasi_proyek',
        'akses_validasi_testimoni',
        'akses_validasi_komentar',
        'akses_validasi_konsultasi',
    ];
}
