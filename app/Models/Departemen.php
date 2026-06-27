<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemen';
    protected $primaryKey = 'id_departemen';
    protected $fillable = [
        'nama_departemen',
        'deskripsi',
        'id_pengguna',
        'created_at',
        'updated_at',
    ];
}
