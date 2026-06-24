<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi_ebook', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('id_pelanggan')->constrained('pelanggan', 'id_pelanggan')->onDelete('cascade');
            $table->foreignId('id_ebook')->constrained('ebook_anggota', 'id_ebook')->onDelete('cascade');
            $table->timestamp('tanggal_beli')->useCurrent();
            $table->decimal('jumlah_bayar', 10, 2);
            $table->enum('status_pembayaran', ['pending', 'lunas'])->default('pending');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi_ebook');
    }
};
