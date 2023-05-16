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
        Schema::create('encuentrospartidos', function (Blueprint $table) {
            $table->id();

            $table->foreignid('encuentro_id')->constrained('encuentros')->onDelete('cascade');
            $table->foreignid('partido_id')->constrained('partidos')->onDelete('cascade');
            
            $table->enum('estado', ['Por Programar', 'Programado', 'Suspendido', 'Jugado'])->default('Por Programar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuentrospartidos');
    }
};
