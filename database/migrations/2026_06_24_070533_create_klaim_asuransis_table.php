<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('klaim_asuransi', function (Blueprint $table) {
            $table->id('id_klaim');
            $table->foreignId('id_asuransi')->constrained('asuransi_proyek', 'id_asuransi')->onDelete('cascade');
            $table->foreignId('id_pelanggan')->constrained('pelanggan', 'id_pelanggan')->onDelete('cascade');
            $table->timestamp('tanggal_klaim')->useCurrent();
            $table->text('deskripsi_kerusakan');
            $table->enum('status', ['diajukan', 'diproses', 'disetujui', 'ditolak'])->default('diajukan');
            $table->string('bukti_foto', 255)->nullable();
            $table->text('catatan_penolakan')->nullable();
            $table->foreignId('id_keuangan_admin')->nullable()->constrained('keuangan', 'id_keuangan')->onDelete('set null');
            $table->timestamp('tanggal_verifikasi')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('klaim_asuransi');
    }
};