<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    protected $fillable = [
        'nama',
        'email',
        'kata_sandi',
        'id_sesi',
        'terdaftar_pada',
        'terakhir_login',
    ];
}
