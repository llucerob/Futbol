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
        Schema::create('clubes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('f_fundacion')->nullable();
            $table->string('insignia')->nullable();
            $table->string('nombrecorto')->nullable();
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->integer('miembros')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubes');
    }
};
