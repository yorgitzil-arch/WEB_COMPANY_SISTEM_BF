<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota_tim', function (Blueprint $table) {
            $table->foreignId('id_tim')->constrained('tim', 'id_tim')->onDelete('cascade');
            $table->foreignId('id_anggota')->constrained('anggota', 'id_anggota')->onDelete('cascade');
            $table->string('peran', 50);
            $table->enum('status_konfirmasi', ['pending', 'setuju', 'menolak'])->default('pending');
            $table->timestamp('tanggal_konfirmasi')->nullable();
            $table->text('kontribusi_detail')->nullable();
            $table->timestamp('bergabung_pada')->useCurrent();
            $table->primary(['id_tim', 'id_anggota']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_tim');
    }
};