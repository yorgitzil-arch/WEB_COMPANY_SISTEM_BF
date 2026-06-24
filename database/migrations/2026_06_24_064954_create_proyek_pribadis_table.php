<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyek_pribadi', function (Blueprint $table) {
            $table->id('id_proyek');
            $table->foreignId('id_anggota')->constrained('anggota', 'id_anggota')->onDelete('cascade');
            $table->string('judul_proyek', 150);
            $table->longText('deskripsi_proyek');
            $table->string('url_domain', 255)->nullable();
            $table->string('gambar_unggah', 255)->nullable();
            $table->string('kategori_bidang', 100)->nullable();
            $table->string('tag_spesifikasi', 100)->nullable();
            $table->foreignId('id_tim')->nullable()->constrained('tim', 'id_tim')->onDelete('set null');
            $table->string('peran_dalam_tim', 50)->nullable();
            $table->string('berkas_proyek', 255)->nullable();
            $table->boolean('hak_cipta_terdaftar')->default(false);
            $table->string('nomor_pencatatan_cipta', 50)->nullable();
            $table->date('tanggal_pencatatan_cipta')->nullable();
            $table->string('lisensi', 50)->nullable();
            $table->enum('status', ['draft', 'pending', 'disetujui', 'ditolak'])->default('draft');
            $table->foreignId('id_admin_validasi')->nullable()->constrained('admin', 'id_admin')->onDelete('set null');
            $table->text('catatan_validasi')->nullable();
            $table->timestamp('tanggal_validasi')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diperbarui_pada')->nullable()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyek_pribadi');
    }
};
