<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EbookHarga extends Model
{
    protected $table = 'ebook_harga';
    protected $primaryKey = 'id_ebook_harga';
    protected $fillable = [
        'id_ebook',
        'harga',
        'mata_uang',
        'tanggal_mulai',
        'tanggal_akhir',
    ];
}
