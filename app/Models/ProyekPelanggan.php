<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyekPelanggan extends Model
{
    protected $table = 'proyek_pelanggan';
    protected $primaryKey = 'id_proyek_pelanggan';
    protected $fillable = [
        'id_pelanggan',
        'nama_proyek',
        'deskripsi_proyek',
        'tanggal_mulai',
        'tanggal_selesai',
        'status_proyek',
        'keterangan',
    ];
}
