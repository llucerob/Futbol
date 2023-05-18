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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('encuentro_id')->constrained('encuentros')->onDelete('cascade');
            
            $table->foreignId('local')->constrained('clubes')->onDelete('cascade');
            $table->foreignId('visita')->constrained('clubes')->onDelete('cascade');
            
            
            $table->enum('estado', ['Por Programar', 'Programado', 'Suspendido', 'Jugado'])->default('Por Programar');
            $table->string('horario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
