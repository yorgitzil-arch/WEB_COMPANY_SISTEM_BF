<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id('id_anggota');
            $table->foreignId('id_pengguna')->unique()->constrained('pengguna', 'id_pengguna')->onDelete('cascade');
            $table->string('gambar_profil', 255)->nullable();
            $table->string('nama_lengkap', 100);
            $table->string('nama_panggilan', 50)->nullable();
            $table->string('email', 100);
            $table->string('nomor_wa', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->longText('deskripsi_diri')->nullable();
            $table->string('bidang_keahlian_utama', 100)->nullable();
            $table->string('url_youtube', 255)->nullable();
            $table->string('url_facebook', 255)->nullable();
            $table->string('url_instagram', 255)->nullable();
            $table->string('url_tiktok', 255)->nullable();
            $table->string('url_linktree', 255)->nullable();
            $table->string('url_blogger', 255)->nullable();
            $table->enum('status_keaktifan', ['aktif', 'nonaktif', 'pending'])->default('pending');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diperbarui_pada')->nullable()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};