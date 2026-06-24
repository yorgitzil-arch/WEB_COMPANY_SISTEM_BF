<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyek_pelanggan', function (Blueprint $table) {
            $table->id('id_proyek_pelanggan');
            $table->foreignId('id_pelanggan')->constrained('pelanggan', 'id_pelanggan')->onDelete('cascade');
            $table->foreignId('id_layanan')->constrained('layanan', 'id_layanan')->onDelete('cascade');
            $table->foreignId('id_departemen')->constrained('departemen', 'id_departemen')->onDelete('cascade');
            $table->foreignId('id_pengajuan')->nullable()->constrained('pengajuan_layanan', 'id_pengajuan')->onDelete('set null');
            $table->string('judul_proyek', 150);
            $table->longText('deskripsi_proyek');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_target_selesai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->decimal('biaya_total', 15, 2)->default(0);
            $table->enum('status_proyek', ['negosiasi', 'dp_dibayar', 'pengerjaan', 'revisi', 'selesai', 'dibatalkan'])->default('negosiasi');
            $table->foreignId('id_penanggung_jawab')->nullable()->constrained('pengguna', 'id_pengguna')->onDelete('set null');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diperbarui_pada')->nullable()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyek_pelanggan');
    }
};
