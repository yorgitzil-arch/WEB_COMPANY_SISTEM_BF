<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengalaman_anggota', function (Blueprint $table) {
            $table->id('id_pengalaman');
            $table->foreignId('id_anggota')->constrained('anggota', 'id_anggota')->onDelete('cascade');
            $table->string('posisi_jabatan', 100);
            $table->string('nama_organisasi', 100);
            $table->year('tahun_mulai');
            $table->year('tahun_selesai')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar_sertifikat', 255)->nullable();
            $table->enum('status_verifikasi', ['pending', 'diverifikasi', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengalaman_anggota');
    }
};