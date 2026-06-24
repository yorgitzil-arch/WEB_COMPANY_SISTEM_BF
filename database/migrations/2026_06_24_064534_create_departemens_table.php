<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departemen', function (Blueprint $table) {
            $table->id('id_departemen');
            $table->foreignId('id_pengguna')->unique()->constrained('pengguna', 'id_pengguna')->onDelete('cascade');
            $table->string('nama_departemen', 100);
            $table->text('deskripsi')->nullable();
            $table->string('bidang_fokus', 100)->nullable();
            $table->string('gambar_ikon', 255)->nullable();
            $table->enum('status_aktif', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departemen');
    }
};