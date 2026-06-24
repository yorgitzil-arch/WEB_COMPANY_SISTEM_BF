<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoProyek extends Model
{
    protected $table = 'video_proyek';
    protected $primaryKey = 'id_video_proyek';
    protected $fillable = [
        'id_proyek',
        'judul_video',
        'url_video',
        'deskripsi_video',
        'tanggal_upload',
    ];
}
