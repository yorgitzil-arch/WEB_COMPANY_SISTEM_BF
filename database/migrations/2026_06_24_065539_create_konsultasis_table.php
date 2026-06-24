<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id('id_konsultasi');
            $table->foreignId('id_pelanggan')->constrained('pelanggan', 'id_pelanggan')->onDelete('cascade');
            $table->foreignId('id_layanan')->nullable()->constrained('layanan', 'id_layanan')->onDelete('set null');
            $table->foreignId('id_departemen')->constrained('departemen', 'id_departemen')->onDelete('cascade');
            $table->string('topik_konsultasi', 150);
            $table->longText('pesan_awal');
            $table->enum('status_admin_validasi', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->text('catatan_admin_validasi')->nullable();
            $table->timestamp('tanggal_admin_validasi')->nullable();
            $table->enum('status', ['baru', 'diproses', 'ditanggapi', 'selesai', 'dibatalkan'])->default('baru');
            $table->foreignId('id_penanggung_jawab')->nullable()->constrained('pengguna', 'id_pengguna')->onDelete('set null');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diperbarui_pada')->nullable()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konsultasi');
    }
};