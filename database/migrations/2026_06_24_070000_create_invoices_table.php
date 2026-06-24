<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id('id_invoice');
            $table->foreignId('id_proyek_pelanggan')->constrained('proyek_pelanggan', 'id_proyek_pelanggan')->onDelete('cascade');
            $table->string('nomor_invoice', 50)->unique();
            $table->string('kode_unik_pembayaran', 20)->unique();
            $table->timestamp('tanggal_terbit')->useCurrent();
            $table->date('tanggal_jatuh_tempo');
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('pajak', 15, 2)->default(0);
            $table->decimal('total_tagihan', 15, 2)->default(0);
            $table->enum('status', ['draft', 'dikirim', 'lunas', 'kadaluarsa'])->default('draft');
            $table->string('metode_pembayaran_terpilih', 50)->nullable();
            $table->foreignId('id_keuangan_admin')->nullable()->constrained('keuangan', 'id_keuangan')->onDelete('set null');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
