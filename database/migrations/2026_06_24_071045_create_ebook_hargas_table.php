<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ebook_harga', function (Blueprint $table) {
            $table->id('id_ebook_harga');
            $table->foreignId('id_ebook')->constrained('ebook_anggota', 'id_ebook')->onDelete('cascade');
            $table->decimal('harga', 10, 2)->default(0);
            $table->boolean('is_free')->default(false);
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ebook_harga');
    }
};