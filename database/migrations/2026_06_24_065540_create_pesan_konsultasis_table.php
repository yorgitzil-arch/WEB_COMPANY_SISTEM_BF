<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesan_konsultasi', function (Blueprint $table) {
            $table->id('id_pesan');
            $table->foreignId('id_konsultasi')->constrained('konsultasi', 'id_konsultasi')->onDelete('cascade');
            $table->foreignId('id_pengirim')->nullable()->constrained('pengguna', 'id_pengguna')->onDelete('set null');
            $table->foreignId('id_pelanggan_pengirim')->nullable()->constrained('pelanggan', 'id_pelanggan')->onDelete('set null');
            $table->longText('isi_pesan');
            $table->string('lampiran', 255)->nullable();
            $table->timestamp('waktu_kirim')->useCurrent();
            $table->boolean('sudah_dibaca')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesan_konsultasi');
    }
};
