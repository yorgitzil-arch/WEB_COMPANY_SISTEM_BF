<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPerusahaan extends Model
{
    protected $table = 'profil_perusahaan';
    protected $primaryKey = 'id_profil_perusahaan';
    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'email',
        'no_telepon',
        'deskripsi',
        'visi',
        'misi',
        'created_at',
        'updated_at',
    ];
}
