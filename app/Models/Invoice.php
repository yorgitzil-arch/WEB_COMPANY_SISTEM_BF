<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'id_invoice';
    protected $fillable = [
        'id_pengguna',
        'id_proyek',
        'nomor_invoice',
        'tanggal_invoice',
        'tanggal_jatuh_tempo',
        'total_tagihan',
        'status_pembayaran',
        'metode_pembayaran',
        'bukti_pembayaran',
        'created_at',
        'updated_at',
    ];
}
