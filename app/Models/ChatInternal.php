<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatInternal extends Model
{
    protected $table = 'chat_internal';
    protected $primaryKey = 'id_chat';
    protected $fillable = [
        'id_pengguna',
        'id_admin',
        'pesan',
        'waktu_dikirim',
    ];
}
