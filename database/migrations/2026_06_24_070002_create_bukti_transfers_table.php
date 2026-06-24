<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bukti_transfer', function (Blueprint $table) {
            $table->id('id_bukti');
            $table->foreignId('id_pembayaran')->constrained('pembayaran_proyek', 'id_pembayaran')->onDelete('cascade');
            $table->foreignId('id_pelanggan')->constrained('pelanggan', 'id_pelanggan')->onDelete('cascade');
            $table->string('gambar_bukti', 255);
            $table->string('nomor_rekening_pengirim', 50)->nullable();
            $table->string('nama_pengirim', 100)->nullable();
            $table->string('bank_pengirim', 50)->nullable();
            $table->decimal('jumlah_transfer', 15, 2);
            $table->timestamp('tanggal_transfer');
            $table->enum('status_verifikasi', ['pending', 'diverifikasi', 'ditolak'])->default('pending');
            $table->text('catatan_penolakan')->nullable();
            $table->foreignId('id_keuangan_verifikator')->nullable()->constrained('keuangan', 'id_keuangan')->onDelete('set null');
            $table->timestamp('tanggal_verifikasi')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bukti_transfer');
    }
};