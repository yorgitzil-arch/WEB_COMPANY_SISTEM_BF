<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaturanSistem extends Model
{
    protected $table = 'pengaturan_sistem';
    protected $primaryKey = 'id_pengaturan_sistem';
    protected $fillable = [
        'nama_perusahaan',
        'alamat_perusahaan',
        'email_perusahaan',
        'no_telepon_perusahaan',
        'logo_perusahaan',
        'favicon_perusahaan',
        'created_at',
        'updated_at',
    ];
}
