<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaldoKas extends Model
{
    protected $table = 'saldo_kas';
    protected $primaryKey = 'id_saldo_kas';
    protected $fillable = [
        'id_anggota',
        'jumlah_saldo',
        'mata_uang',
        'tanggal_saldo',
        'keterangan',
    ];
}
