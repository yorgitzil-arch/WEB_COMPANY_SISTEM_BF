<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    protected $table = 'tentang_kami';
    protected $primaryKey = 'id_tentang_kami';
    protected $fillable = [
        'judul_tentang_kami',
        'deskripsi_tentang_kami',
        'gambar_tentang_kami',
        'created_at',
        'updated_at',
    ];
}
