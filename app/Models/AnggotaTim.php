<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaTim extends Model
{
    protected $table = 'anggota_tim';
    protected $primaryKey = 'id_anggota_tim';
    protected $fillable = [
        'nama',
        'email',
        'kata_sandi',
        'id_sesi',
        'terdaftar_pada',
        'terakhir_login',
    ];
}
