<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemen';
    protected $primaryKey = 'id_departemen';
    
    protected $fillable = [
        'id_pengguna',        // Foreign key ke pengguna
        'nama_departemen',
        'deskripsi',
        'bidang_fokus',
        'gambar_ikon',
        'status_aktif',
        'dibuat_pada',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}