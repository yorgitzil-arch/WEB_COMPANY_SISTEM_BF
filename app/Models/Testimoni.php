<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey = 'id_testimoni';
    protected $fillable = [
        'nama_testimoni',
        'jabatan_testimoni',
        'perusahaan_testimoni',
        'foto_testimoni',
        'isi_testimoni',
        'status_testimoni',
        'created_at',
        'updated_at',
    ];
}
