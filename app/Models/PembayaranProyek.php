<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranProyek extends Model
{
    protected $table = 'pembayaran_proyek';
    protected $primaryKey = 'id_pembayaran_proyek';
    protected $fillable = [
        'id_proyek',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
        'metode_pembayaran',
        'status_pembayaran',
    ];
}
