<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    protected $table = 'log_aktivitas';
    protected $primaryKey = 'id_log';
    protected $fillable = [
        'id_pengguna',
        'aksi',
        'tabel_terkait',
        'id_data_terkait',
        'perubahan_detail',
        'alamat_ip',
        'waktu',
    ];
}
