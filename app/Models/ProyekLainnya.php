<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyekLainnya extends Model
{
    protected $table = 'proyek_lainnya';
    protected $primaryKey = 'id_proyek_lainnya';
    protected $fillable = [
        'nama_proyek',
        'deskripsi_proyek',
        'tanggal_mulai',
        'tanggal_selesai',
        'status_proyek',
        'keterangan',
    ];
}
