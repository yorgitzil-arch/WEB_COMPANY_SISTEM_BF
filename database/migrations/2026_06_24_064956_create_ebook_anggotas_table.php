<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ebook_anggota', function (Blueprint $table) {
            $table->id('id_ebook');
            $table->foreignId('id_anggota')->constrained('anggota', 'id_anggota')->onDelete('cascade');
            $table->string('judul_ebook', 150);
            $table->longText('deskripsi_ebook')->nullable();
            $table->string('gambar_sampul', 255)->nullable();
            $table->string('file_ebook', 255);
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->foreignId('id_admin_validasi')->nullable()->constrained('admin', 'id_admin')->onDelete('set null');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ebook_anggota');
    }
};