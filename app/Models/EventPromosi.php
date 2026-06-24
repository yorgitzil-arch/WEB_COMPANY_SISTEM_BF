<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPromosi extends Model
{
    protected $table = 'event_promosi';
    protected $primaryKey = 'id_event_promosi';
    protected $fillable = [
        'nama_event',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_akhir',
        'gambar_event',
    ];
}
