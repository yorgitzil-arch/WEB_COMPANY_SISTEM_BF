<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifikasi_pelanggan', function (Blueprint $table) {
            $table->id('id_notif');
            $table->foreignId('id_pelanggan')->nullable()->constrained('pelanggan', 'id_pelanggan')->onDelete('cascade');
            $table->string('judul', 150);
            $table->text('pesan');
            $table->string('tautan', 255)->nullable();
            $table->boolean('is_broadcast')->default(false);
            $table->boolean('sudah_dibaca')->default(false);
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi_pelanggan');
    }
};