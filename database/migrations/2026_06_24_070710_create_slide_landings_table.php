<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('slide_landing', function (Blueprint $table) {
            $table->id('id_slide');
            $table->string('gambar', 255);
            $table->string('judul', 100)->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('urutan_tampil')->default(0);
            $table->boolean('status_tayang')->default(true);
            $table->string('tautan_cta', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slide_landing');
    }
};
