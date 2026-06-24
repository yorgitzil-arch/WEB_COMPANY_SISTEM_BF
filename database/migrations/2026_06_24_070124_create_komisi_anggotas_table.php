<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komisi_anggota', function (Blueprint $table) {
            $table->id('id_komisi');
            $table->foreignId('id_anggota')->constrained('anggota', 'id_anggota')->onDelete('cascade');
            $table->foreignId('id_proyek_pelanggan')->constrained('proyek_pelanggan', 'id_proyek_pelanggan')->onDelete('cascade');
            $table->foreignId('id_penugasan')->constrained('penugasan_proyek', 'id_penugasan')->onDelete('cascade');
            $table->decimal('persentase_komisi', 5, 2)->default(10.00);
            $table->decimal('jumlah_komisi_kotor', 15, 2);
            $table->decimal('potongan_kas_company', 15, 2)->default(0);
            $table->decimal('jumlah_komisi_bersih', 15, 2);
            $table->enum('status', ['pending', 'dibayar'])->default('pending');
            $table->date('tanggal_jatuh_tempo')->nullable();
            $table->date('tanggal_dibayar')->nullable();
            $table->foreignId('id_pengeluaran')->nullable()->constrained('pengeluaran', 'id_pengeluaran')->onDelete('set null');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komisi_anggota');
    }
};