<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsuransiProyek extends Model
{
    protected $table = 'asuransi_proyek';
    protected $primaryKey = 'id_asuransi_proyek';
    protected $fillable = [
        'id_proyek',
        'nama_asuransi',
        'nomor_polis',
        'tanggal_mulai',
        'tanggal_akhir',
        'dokumen_asuransi',
    ];
}
