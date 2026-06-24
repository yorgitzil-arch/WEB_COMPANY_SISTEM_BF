<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penugasan_proyek', function (Blueprint $table) {
            $table->id('id_penugasan');
            $table->foreignId('id_proyek_pelanggan')->constrained('proyek_pelanggan', 'id_proyek_pelanggan')->onDelete('cascade');
            $table->foreignId('id_departemen')->constrained('departemen', 'id_departemen')->onDelete('cascade');
            $table->foreignId('id_anggota')->constrained('anggota', 'id_anggota')->onDelete('cascade');
            $table->string('peran', 50);
            $table->timestamp('tanggal_tugas')->useCurrent();
            $table->date('deadline')->nullable();
            $table->enum('status', ['pending', 'diterima', 'dikerjakan', 'selesai', 'dibatalkan'])->default('pending');
            $table->text('catatan_penugasan')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penugasan_proyek');
    }
};