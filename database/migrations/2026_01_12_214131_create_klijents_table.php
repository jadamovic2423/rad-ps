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
        Schema::create('klijents', function (Blueprint $table) {
            $table->id();
            $table->string('klijent', 30);
            $table->string('banka', 25);
            $table->enum('status', ["aktivan","neaktivan"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klijents');
    }
};
