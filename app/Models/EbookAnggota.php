<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EbookAnggota extends Model
{
    protected $table = 'ebook_anggota';
    protected $primaryKey = 'id_ebook_anggota';
    protected $fillable = [
        'id_anggota',
        'id_ebook',
        'tanggal_akses',
    ];
}
