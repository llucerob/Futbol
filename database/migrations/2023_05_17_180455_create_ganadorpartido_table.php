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
        Schema::create('ganadorpartido', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serie_id')->constrained('series')->ondelete('cascade');
            $table->foreignid('partido_id')->constrained('partidos')->ondelete('cascade');
            $table->foreignid('ganador')->constrained('clubes')->ondelete('cascade');
            $table->integer('golesganador');
            $table->foreignId('perdedor')->constrained('clubes')->ondelete('cascade');
            $table->integer('golesperdedor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganadorpartido');
    }
};
