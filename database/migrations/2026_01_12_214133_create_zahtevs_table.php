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
        Schema::create('zahtevs', function (Blueprint $table) {
            $table->id();
            $table->string('naziv', 50);
            $table->text('sadrzaj');
            $table->enum('status_zahteva', ["novi","otvoren","analiza","razvoj","zatvoren"]);
            $table->enum('vrsta', ["bug","razvoj","regulativa"]);
            $table->enum('prioritet', ["nizak","normalan","visok","kritican"]);
            $table->string('fajl')->nullable();
            $table->dateTime('datum_kreiranja');
            $table->foreignId('klijent_id');
            $table->foreignId('product_specialist_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zahtevs');
    }
};
