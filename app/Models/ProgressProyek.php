<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressProyek extends Model
{
    protected $table = 'progress_proyek';
    protected $primaryKey = 'id_progress_proyek';
    protected $fillable = [
        'id_proyek',
        'tanggal_progress',
        'deskripsi_progress',
        'status_progress',
    ];
}
