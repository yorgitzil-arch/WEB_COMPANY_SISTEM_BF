<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeahlianAnggota extends Model
{
    protected $table = 'keahlian_anggota';
    protected $primaryKey = 'id_keahlian_anggota';
    protected $fillable = [
        'id_anggota',
        'keahlian',
        'tingkat_keahlian',
        'tahun_pengalaman',
    ];
}
