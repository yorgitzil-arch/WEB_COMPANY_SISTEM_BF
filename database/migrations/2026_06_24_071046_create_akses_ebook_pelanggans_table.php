<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('akses_ebook_pelanggan', function (Blueprint $table) {
            $table->foreignId('id_pelanggan')->constrained('pelanggan', 'id_pelanggan')->onDelete('cascade');
            $table->foreignId('id_ebook')->constrained('ebook_anggota', 'id_ebook')->onDelete('cascade');
            $table->timestamp('tanggal_akses_mulai')->useCurrent();
            $table->timestamp('tanggal_akses_berakhir')->nullable();
            $table->primary(['id_pelanggan', 'id_ebook']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('akses_ebook_pelanggan');
    }
};