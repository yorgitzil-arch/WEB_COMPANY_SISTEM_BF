<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatInternalTim extends Model
{
    protected $table = 'chat_internal_tim';
    protected $primaryKey = 'id_chat';
    protected $fillable = [
        'id_pengguna',
        'id_tim',
        'pesan',
        'waktu_dikirim',
    ];
}
