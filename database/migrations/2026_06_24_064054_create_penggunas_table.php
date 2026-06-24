<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('email', 100)->unique();
            $table->string('kata_sandi', 255);
            $table->string('id_sesi', 100)->nullable();
            $table->enum('peran', ['admin', 'keuangan', 'anggota', 'departemen', 'pelanggan'])->default('anggota');
            $table->timestamp('terdaftar_pada')->useCurrent();
            $table->timestamp('terakhir_login')->nullable();
            $table->index('email');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};