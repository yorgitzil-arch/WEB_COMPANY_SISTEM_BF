<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AksesEbookPelanggan extends Model
{
    protected $table = 'akses_ebook_pelanggan';
    protected $primaryKey = 'id_akses';
    protected $fillable = [
        'id_pelanggan',
        'id_ebook',
        'tanggal_akses',
    ];
}
