<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideLanding extends Model
{
    protected $table = 'slide_landing';
    protected $primaryKey = 'id_slide_landing';
    protected $fillable = [
        'judul_slide',
        'deskripsi_slide',
        'gambar_slide',
        'link_slide',
        'urutan_slide',
        'status_slide',
    ];
}
