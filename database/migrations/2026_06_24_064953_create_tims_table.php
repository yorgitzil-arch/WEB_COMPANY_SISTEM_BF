<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tim', function (Blueprint $table) {
            $table->id('id_tim');
            $table->string('nama_tim', 100);
            $table->foreignId('id_ketua')->constrained('anggota', 'id_anggota')->onDelete('cascade');
            $table->text('deskripsi_tim')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tim');
    }
};
