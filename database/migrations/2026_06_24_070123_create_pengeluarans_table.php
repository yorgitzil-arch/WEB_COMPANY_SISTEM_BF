<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id('id_pengeluaran');
            $table->foreignId('id_kategori_pengeluaran')->constrained('kategori_pengeluaran', 'id_kategori')->onDelete('restrict');
            $table->foreignId('id_anggota')->nullable()->constrained('anggota', 'id_anggota')->onDelete('set null');
            $table->foreignId('id_proyek_pelanggan')->nullable()->constrained('proyek_pelanggan', 'id_proyek_pelanggan')->onDelete('set null');
            $table->string('judul', 150);
            $table->text('deskripsi')->nullable();
            $table->decimal('jumlah', 15, 2);
            $table->timestamp('tanggal_pengeluaran')->useCurrent();
            $table->string('bukti_struk', 255)->nullable();
            $table->enum('status', ['pending', 'disetujui'])->default('pending');
            $table->foreignId('id_keuangan_admin')->nullable()->constrained('keuangan', 'id_keuangan')->onDelete('set null');
            $table->text('catatan')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};