<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komentar_pengunjung', function (Blueprint $table) {
            $table->id('id_komentar');
            $table->string('nama', 100);
            $table->string('email', 100);
            $table->text('isi_komentar');
            $table->enum('status_tayang', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komentar_pengunjung');
    }
};