<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPengeluaran extends Model
{
    protected $table = 'kategori_pengeluaran';
    protected $primaryKey = 'id_kategori_pengeluaran';
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'created_at',
        'updated_at',
    ];
}
