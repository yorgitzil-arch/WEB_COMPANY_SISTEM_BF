<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_proyek', function (Blueprint $table) {
            $table->id('id_video');
            $table->foreignId('id_anggota')->constrained('anggota', 'id_anggota')->onDelete('cascade');
            $table->string('judul_video', 150);
            $table->longText('deskripsi_video')->nullable();
            $table->string('url_video', 255);
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->foreignId('id_admin_validasi')->nullable()->constrained('admin', 'id_admin')->onDelete('set null');
            $table->text('catatan_validasi')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_proyek');
    }
};
