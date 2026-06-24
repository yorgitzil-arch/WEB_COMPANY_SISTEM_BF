<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $table = 'pemasukan';
    protected $primaryKey = 'id_pemasukan';
    protected $fillable = [
        'id_anggota',
        'jenis_pemasukan',
        'jumlah_pemasukan',
        'mata_uang',
        'tanggal_pemasukan',
        'keterangan',
    ];
}
