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
        Schema::create('sanciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partido_id')->constrained('partidos')->ondelete();
            $table->foreignId('jugador_id')->constrained('jugadores')->ondelete();
            $table->enum('sancion', ['Amarilla', 'Roja'])->nullable();
            $table->integer('sinjugar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanciones');
    }
};
