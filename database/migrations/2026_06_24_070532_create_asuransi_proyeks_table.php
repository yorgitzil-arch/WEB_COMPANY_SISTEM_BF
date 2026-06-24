<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asuransi_proyek', function (Blueprint $table) {
            $table->id('id_asuransi');
            $table->foreignId('id_proyek_pelanggan')->constrained('proyek_pelanggan', 'id_proyek_pelanggan')->onDelete('cascade');
            $table->string('jenis_asuransi', 100);
            $table->date('masa_berlaku_mulai');
            $table->date('masa_berlaku_selesai');
            $table->text('klausul')->nullable();
            $table->boolean('status_aktif')->default(true);
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asuransi_proyek');
    }
};