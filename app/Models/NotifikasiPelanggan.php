<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotifikasiPelanggan extends Model
{
    protected $table = 'notifikasi_pelanggan';
    protected $primaryKey = 'id_notifikasi_pelanggan';
    protected $fillable = [
        'id_pelanggan',
        'judul_notifikasi',
        'isi_notifikasi',
        'tanggal_notifikasi',
        'status_notifikasi',
    ];
}
