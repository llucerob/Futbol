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
        Schema::create('tablapuntos', function (Blueprint $table) {
            $table->id();
            $table->foreignid('competencia_id')->constrained('campeonatos')->ondelete('cascade');
            $table->foreignid('serie_id')->constrained('series')->ondelete('cascade');
            $table->foreignid('club_id')->constrained('clubes')->ondelete('cascade');
            $table->integer('jugados')->default(0);
            $table->integer('ganados')->default(0);
            $table->integer('empatados')->default(0);
            $table->integer('perdidos')->default(0);
            $table->integer('golesfavor')->default(0);
            $table->integer('golescontra')->default(0);
            $table->integer('diferenciagoles')->default(0);
            $table->integer('puntos')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tablapuntos');
    }
};
