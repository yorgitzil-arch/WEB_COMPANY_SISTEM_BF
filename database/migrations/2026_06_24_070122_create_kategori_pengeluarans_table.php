<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_pengeluaran', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori', 50)->unique();
            $table->text('deskripsi')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });

        // Insert default categories
        DB::table('kategori_pengeluaran')->insert([
            ['nama_kategori' => 'Gaji Karyawan', 'deskripsi' => 'Gaji tetap admin, dev, dan staf'],
            ['nama_kategori' => 'Komisi Anggota', 'deskripsi' => 'Komisi fee proyek untuk anggota'],
            ['nama_kategori' => 'Alat & Bahan', 'deskripsi' => 'Alat kerja, bahan baku proyek'],
            ['nama_kategori' => 'Server & Infrastruktur', 'deskripsi' => 'Biaya hosting, domain, server'],
            ['nama_kategori' => 'Marketing & Promosi', 'deskripsi' => 'Iklan, event, promosi'],
            ['nama_kategori' => 'Operasional', 'deskripsi' => 'Listrik, internet, ATK, transport'],
            ['nama_kategori' => 'Lainnya', 'deskripsi' => 'Pengeluaran tidak terduga'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_pengeluaran');
    }
};