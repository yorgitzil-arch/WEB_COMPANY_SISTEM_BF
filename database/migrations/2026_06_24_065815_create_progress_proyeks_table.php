<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('progress_proyek', function (Blueprint $table) {
            $table->id('id_progress');
            $table->foreignId('id_penugasan')->constrained('penugasan_proyek', 'id_penugasan')->onDelete('cascade');
            $table->string('judul_progress', 150);
            $table->text('deskripsi_progress')->nullable();
            $table->string('gambar_upload', 255)->nullable();
            $table->string('file_upload', 255)->nullable();
            $table->integer('persentase_progress')->default(0);
            $table->enum('status', ['draft', 'dikirim', 'disetujui', 'revisi'])->default('draft');
            $table->timestamp('tanggal_kirim')->useCurrent();
            $table->timestamp('tanggal_validasi')->nullable();
            $table->text('catatan_revisi')->nullable();
            $table->foreignId('id_departemen_validasi')->nullable()->constrained('departemen', 'id_departemen')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progress_proyek');
    }
};