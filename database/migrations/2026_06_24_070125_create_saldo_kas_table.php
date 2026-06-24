<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saldo_kas', function (Blueprint $table) {
            $table->id('id_saldo');
            $table->decimal('saldo_sekarang', 15, 2)->default(0);
            $table->timestamp('terakhir_diperbarui')->useCurrent()->useCurrentOnUpdate();
            $table->timestamps();
        });

        // Insert initial saldo
        DB::table('saldo_kas')->insert([
            ['saldo_sekarang' => 0]
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('saldo_kas');
    }
};