<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraKlien extends Model
{
    protected $table = 'mitra_klien';
    protected $primaryKey = 'id_mitra_klien';
    protected $fillable = [
        'nama_mitra_klien',
        'alamat',
        'email',
        'no_telepon',
        'created_at',
        'updated_at',
    ];
}
