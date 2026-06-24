<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesanKonsultasi extends Model
{
    protected $table = 'pesan_konsultasi';
    protected $primaryKey = 'id_pesan_konsultasi';
    protected $fillable = [
        'id_anggota',
        'id_pelanggan',
        'judul_pesan',
        'isi_pesan',
        'tanggal_pesan',
        'status_pesan',
    ];
}
