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
        Schema::table('estadios', function (Blueprint $table) {
            $table->foreignId('club_id')->constrained('clubes')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estadios', function (Blueprint $table) {
            $table->dropForeign('club_id');
            $table->dropColumn('club_id');
        });
    }
};
