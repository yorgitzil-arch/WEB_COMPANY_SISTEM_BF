<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran_proyek', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->foreignId('id_proyek_pelanggan')->constrained('proyek_pelanggan', 'id_proyek_pelanggan')->onDelete('cascade');
            $table->foreignId('id_invoice')->constrained('invoice', 'id_invoice')->onDelete('cascade');
            $table->enum('jenis', ['dp', 'pelunasan', 'cicilan']);
            $table->decimal('jumlah', 15, 2);
            $table->enum('status_pembayaran', ['pending', 'diverifikasi', 'ditolak'])->default('pending');
            $table->timestamp('tanggal_pembayaran')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_proyek');
    }
};