<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenugasanProyek extends Model
{
    protected $table = 'penugasan_proyek';
    protected $primaryKey = 'id_penugasan_proyek';
    protected $fillable = [
        'id_proyek',
        'id_anggota',
        'tanggal_penugasan',
        'status_penugasan',
        'keterangan',
    ];
}
