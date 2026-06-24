<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->id('id_layanan');
            $table->foreignId('id_departemen')->constrained('departemen', 'id_departemen')->onDelete('cascade');
            $table->string('nama_layanan', 150);
            $table->longText('deskripsi_layanan')->nullable();
            $table->decimal('harga_estimasi', 15, 2)->nullable();
            $table->string('durasi_pengerjaan', 50)->nullable();
            $table->string('gambar_banner', 255)->nullable();
            $table->enum('status_tayang', ['draft', 'tayang', 'arsip'])->default('draft');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diperbarui_pada')->nullable()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};