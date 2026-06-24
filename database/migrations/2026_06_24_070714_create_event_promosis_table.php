<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_promosi', function (Blueprint $table) {
            $table->id('id_event');
            $table->string('judul_event', 150);
            $table->string('gambar_banner', 255)->nullable();
            $table->longText('deskripsi_event')->nullable();
            $table->timestamp('waktu_mulai')->useCurrent(); 
            $table->timestamp('waktu_selesai')->nullable();
            $table->enum('status', ['draft', 'aktif', 'berakhir'])->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_promosi');
    }
};