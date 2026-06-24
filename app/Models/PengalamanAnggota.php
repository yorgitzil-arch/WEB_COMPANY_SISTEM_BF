<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengalamanAnggota extends Model
{
    protected $table = 'pengalaman_anggota';
    protected $primaryKey = 'id_pengalaman_anggota';
    protected $fillable = [
        'id_anggota',
        'nama_perusahaan',
        'posisi',
        'deskripsi_pekerjaan',
        'tanggal_mulai',
        'tanggal_selesai',
        'created_at',
        'updated_at',
    ];
}
