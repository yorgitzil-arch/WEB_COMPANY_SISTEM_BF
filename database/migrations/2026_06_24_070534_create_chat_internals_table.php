<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_internal', function (Blueprint $table) {
            $table->id('id_chat');
            $table->foreignId('id_proyek_pelanggan')->constrained('proyek_pelanggan', 'id_proyek_pelanggan')->onDelete('cascade');
            $table->foreignId('id_pengirim')->constrained('pengguna', 'id_pengguna')->onDelete('cascade');
            $table->enum('tipe_pengirim', ['anggota', 'pelanggan', 'departemen']);
            $table->text('isi_pesan');
            $table->string('lampiran', 255)->nullable();
            $table->boolean('sudah_dibaca')->default(false);
            $table->timestamp('waktu_kirim')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_internal');
    }
};