<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mutasi_saldo', function (Blueprint $table) {
            $table->id('id_mutasi');
            $table->foreignId('id_pemasukan')->nullable()->constrained('pemasukan', 'id_pemasukan')->onDelete('set null');
            $table->foreignId('id_pengeluaran')->nullable()->constrained('pengeluaran', 'id_pengeluaran')->onDelete('set null');
            $table->enum('jenis', ['pemasukan', 'pengeluaran']);
            $table->decimal('jumlah', 15, 2);
            $table->decimal('saldo_sebelumnya', 15, 2);
            $table->decimal('saldo_setelahnya', 15, 2);
            $table->timestamp('tanggal_mutasi')->useCurrent();
            $table->text('catatan')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mutasi_saldo');
    }
};
