<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id('id_notifikasi');
            $table->foreignId('id_pengguna_tujuan')->constrained('pengguna', 'id_pengguna')->onDelete('cascade');
            $table->string('judul', 150);
            $table->text('pesan');
            $table->string('tautan', 255)->nullable();
            $table->boolean('sudah_dibaca')->default(false);
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};