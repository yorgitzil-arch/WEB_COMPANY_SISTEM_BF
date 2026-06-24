<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuktiTransfer extends Model
{
    protected $table = 'bukti_transfer';
    protected $primaryKey = 'id_bukti_transfer';
    protected $fillable = [
        'id_pembayaran',
        'nama_pengirim',
        'bank_pengirim',
        'nomor_rekening_pengirim',
        'tanggal_transfer',
        'jumlah_transfer',
        'bukti_transfer',
    ];
}
