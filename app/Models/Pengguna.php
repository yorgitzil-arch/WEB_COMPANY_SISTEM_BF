<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;  
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable  
{
    use HasFactory, Notifiable;

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'email',
        'kata_sandi',
        'id_sesi',
        'peran',
        'terdaftar_pada',
        'terakhir_login',
    ];

    protected $hidden = [
        'kata_sandi',
        'id_sesi',
    ];


    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }


    public function admin()
    {
        return $this->hasOne(Admin::class, 'id_pengguna');
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'id_pengguna');
    }

    public function departemen()
    {
        return $this->hasOne(Departemen::class, 'id_pengguna');
    }

    public function keuangan()
    {
        return $this->hasOne(Keuangan::class, 'id_pengguna');
    }

    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'id_pengguna');
    }
}