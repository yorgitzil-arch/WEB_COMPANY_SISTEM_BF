<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MutasiSaldo extends Model
{
    protected $table = 'mutasi_saldo';
    protected $primaryKey = 'id_mutasi_saldo';
    protected $fillable = [
        'id_anggota',
        'jenis_mutasi',
        'jumlah_mutasi',
        'mata_uang',
        'tanggal_mutasi',
        'keterangan',
    ];
}
