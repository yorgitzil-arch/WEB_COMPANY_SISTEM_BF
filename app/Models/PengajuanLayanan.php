<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanLayanan extends Model
{
    protected $table = 'pengajuan_layanan';
    protected $primaryKey = 'id_pengajuan_layanan';
    protected $fillable = [
        'id_pelanggan',
        'id_layanan',
        'tanggal_pengajuan',
        'status_pengajuan',
        'keterangan',
    ];
}
