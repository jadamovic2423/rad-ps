<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obrada_zahtevas', function (Blueprint $table) {
            $table->id();
            $table->text('komentar_product_sp')->nullable();
            $table->text('komentar_klijenta')->nullable();
            $table->string('dodatni_fajl')->nullable();
            $table->foreignId('zahtev_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obrada_zahtevas');
    }
};
