<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_perusahaan', function (Blueprint $table) {
            $table->id('id_profil');
            $table->string('nama_perusahaan', 100);
            $table->longText('filosofi')->nullable();
            $table->longText('sejarah')->nullable();
            $table->string('gambar_struktur_tim', 255)->nullable();
            $table->string('gambar_banner_tim', 255)->nullable();
            $table->timestamp('diperbarui_pada')->nullable()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_perusahaan');
    }
};