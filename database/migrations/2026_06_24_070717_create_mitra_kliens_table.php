<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mitra_klien', function (Blueprint $table) {
            $table->id('id_mitra');
            $table->string('nama_mitra', 100);
            $table->string('logo', 255)->nullable();
            $table->string('url_website', 255)->nullable();
            $table->integer('urutan_tampil')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mitra_klien');
    }
};