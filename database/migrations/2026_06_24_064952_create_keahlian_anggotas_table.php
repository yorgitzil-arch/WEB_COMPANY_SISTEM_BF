<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keahlian_anggota', function (Blueprint $table) {
            $table->id('id_keahlian');
            $table->foreignId('id_anggota')->constrained('anggota', 'id_anggota')->onDelete('cascade');
            $table->enum('jenis_keahlian', ['soft_skill', 'hard_skill', 'framework']);
            $table->string('nama_keahlian', 100);
            $table->integer('tingkat_keahlian')->default(1);
            $table->integer('tahun_pengalaman')->default(0);
            $table->string('ikon_badge', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keahlian_anggota');
    }
};
