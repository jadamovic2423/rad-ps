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
        Schema::create('reprodukovanje_zahtevas', function (Blueprint $table) {
            $table->id();
            $table->integer('reprodukovanje_pokusaj');
            $table->boolean('reprodukovan');
            $table->text('komentar');
            $table->foreignId('zahtev_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reprodukovanje_zahtevas');
    }
};
