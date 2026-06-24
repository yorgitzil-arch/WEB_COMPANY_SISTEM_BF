<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomentarPengunjung extends Model
{
    protected $table = 'komentar_pengunjung';
    protected $primaryKey = 'id_komentar_pengunjung';
    protected $fillable = [
        'nama_pengunjung',
        'email_pengunjung',
        'isi_komentar',
        'tanggal_komentar',
    ];
}
