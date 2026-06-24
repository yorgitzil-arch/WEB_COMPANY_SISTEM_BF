<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomisiAnggota extends Model
{
    protected $table = 'komisi_anggota';
    protected $primaryKey = 'id_komisi_anggota';
    protected $fillable = [
        'id_anggota',
        'jenis_komisi',
        'jumlah_komisi',
        'mata_uang',
        'tanggal_komisi',
    ];
}
