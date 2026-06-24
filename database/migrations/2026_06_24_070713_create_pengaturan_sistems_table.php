<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaturan_sistem', function (Blueprint $table) {
            $table->id('id_pengaturan');
            $table->string('nama_brand', 100);
            $table->string('logo_brand', 255)->nullable();
            $table->text('alamat_brand')->nullable();
            $table->string('url_lokasi', 255)->nullable();
            $table->string('email_brand', 100);
            $table->string('url_youtube', 255)->nullable();
            $table->string('url_facebook', 255)->nullable();
            $table->string('url_instagram', 255)->nullable();
            $table->string('url_tiktok', 255)->nullable();
            $table->string('metadata_title', 100)->nullable();
            $table->text('metadata_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaturan_sistem');
    }
};