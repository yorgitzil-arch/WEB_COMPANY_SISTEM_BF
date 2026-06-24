<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyekPribadi extends Model
{
    protected $table = 'proyek_pribadi';
    protected $primaryKey = 'id_proyek_pribadi';
    protected $fillable = [
        'nama_proyek',
        'deskripsi_proyek',
        'tanggal_mulai',
        'tanggal_selesai',
        'status_proyek',
        'keterangan',
    ];
}
