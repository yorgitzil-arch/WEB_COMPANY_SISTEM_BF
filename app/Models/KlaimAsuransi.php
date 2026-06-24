<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KlaimAsuransi extends Model
{
    protected $table = 'klaim_asuransi';
    protected $primaryKey = 'id_klaim_asuransi';
    protected $fillable = [
        'id_anggota',
        'jenis_asuransi',
        'tanggal_klaim',
        'jumlah_klaim',
        'status_klaim',
        'keterangan',
    ];
}
