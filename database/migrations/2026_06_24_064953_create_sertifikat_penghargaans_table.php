<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sertifikat_penghargaan', function (Blueprint $table) {
            $table->id('id_sertifikat');
            $table->foreignId('id_anggota')->constrained('anggota', 'id_anggota')->onDelete('cascade');
            $table->string('judul', 150);
            $table->string('penerbit', 100);
            $table->year('tahun_terbit');
            $table->string('gambar_sertifikat', 255)->nullable();
            $table->enum('status_verifikasi', ['pending', 'diverifikasi', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sertifikat_penghargaan');
    }
};