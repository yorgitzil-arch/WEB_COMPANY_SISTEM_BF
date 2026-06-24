<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $fillable = [
        'id_anggota',
        'id_kategori_pengeluaran',
        'jumlah_pengeluaran',
        'mata_uang',
        'tanggal_pengeluaran',
        'keterangan',
    ];
}
