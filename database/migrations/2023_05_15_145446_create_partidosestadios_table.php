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
        Schema::create('partidosestadios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partido_id')
                ->constrained('partidos')
                ->onDelete('cascade');
            $table->foreignId('estadio_id')
                ->constrained('estadios')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidosestadios');
    }
};
