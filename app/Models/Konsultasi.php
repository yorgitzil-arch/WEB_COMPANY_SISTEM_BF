<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $table = 'konsultasi';
    protected $primaryKey = 'id_konsultasi';
    protected $fillable = [
        'id_anggota',
        'topik_konsultasi',
        'isi_konsultasi',
        'tanggal_konsultasi',
        'status_konsultasi',
    ];
}
