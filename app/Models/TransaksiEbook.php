<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiEbook extends Model
{
    protected $table = 'transaksi_ebook';
    protected $primaryKey = 'id_transaksi_ebook';
    protected $fillable = [
        'id_anggota',
        'id_ebook',
        'jumlah_transaksi',
        'mata_uang',
        'tanggal_transaksi',
        'status_transaksi',
    ];
}
