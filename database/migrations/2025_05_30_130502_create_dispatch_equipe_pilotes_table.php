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
        Schema::create('dispatch_equipe_pilotes', function (Blueprint $table) {
            $table->id();
             $table->foreignId('equipe_disponible_id')->constrained('equipes_disponibles')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // pilote
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatch_equipe_pilotes');
    }
};
