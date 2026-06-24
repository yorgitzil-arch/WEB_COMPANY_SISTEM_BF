<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_internal_tim', function (Blueprint $table) {
            $table->id('id_chat');
            $table->foreignId('id_penugasan')->constrained('penugasan_proyek', 'id_penugasan')->onDelete('cascade');
            $table->foreignId('id_pengirim')->constrained('pengguna', 'id_pengguna')->onDelete('cascade');
            $table->enum('tipe_pengirim', ['anggota', 'departemen']);
            $table->text('isi_pesan');
            $table->timestamp('waktu_kirim')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_internal_tim');
    }
};