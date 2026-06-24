<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = 'tim';
    protected $primaryKey = 'id_tim';
    protected $fillable = [
        'nama_tim',
        'deskripsi_tim',
        'tanggal_dibuat',
        'status_tim',
    ];
}
