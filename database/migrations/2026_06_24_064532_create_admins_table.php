<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_admin');
            $table->foreignId('id_pengguna')->unique()->constrained('pengguna', 'id_pengguna')->onDelete('cascade');
            $table->string('nama_lengkap', 100);
            $table->string('email', 100);
            $table->string('kata_sandi', 255);
            $table->boolean('akses_validasi_proyek')->default(true);
            $table->boolean('akses_validasi_testimoni')->default(true);
            $table->boolean('akses_validasi_komentar')->default(true);
            $table->boolean('akses_validasi_konsultasi')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};