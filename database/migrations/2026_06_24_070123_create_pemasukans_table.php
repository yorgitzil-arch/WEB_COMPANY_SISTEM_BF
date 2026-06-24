<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id('id_pemasukan');
            $table->foreignId('id_proyek_pelanggan')->nullable()->constrained('proyek_pelanggan', 'id_proyek_pelanggan')->onDelete('set null');
            $table->foreignId('id_pembayaran')->nullable()->constrained('pembayaran_proyek', 'id_pembayaran')->onDelete('set null');
            $table->string('sumber', 100);
            $table->decimal('jumlah', 15, 2);
            $table->string('kategori', 50)->nullable();
            $table->timestamp('tanggal_pemasukan')->useCurrent();
            $table->text('catatan')->nullable();
            $table->enum('status', ['confirmed', 'pending'])->default('confirmed');
            $table->foreignId('id_keuangan_admin')->nullable()->constrained('keuangan', 'id_keuangan')->onDelete('set null');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemasukan');
    }
};