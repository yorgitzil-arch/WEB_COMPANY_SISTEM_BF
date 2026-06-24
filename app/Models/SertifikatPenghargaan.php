<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SertifikatPenghargaan extends Model
{
    protected $table = 'sertifikat_penghargaan';
    protected $primaryKey = 'id_sertifikat_penghargaan';
    protected $fillable = [
        'id_anggota',
        'nama_sertifikat',
        'tanggal_terbit',
        'keterangan',
    ];
}
