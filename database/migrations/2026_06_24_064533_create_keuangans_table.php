<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id('id_keuangan');
            $table->foreignId('id_pengguna')->unique()->constrained('pengguna', 'id_pengguna')->onDelete('cascade');
            $table->string('nama_lengkap', 100);
            $table->string('email', 100);
            $table->string('kata_sandi', 255);
            $table->boolean('akses_verifikasi_bukti')->default(true);
            $table->boolean('akses_kelola_pengeluaran')->default(true);
            $table->boolean('akses_kelola_komisi')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keuangan');
    }
};