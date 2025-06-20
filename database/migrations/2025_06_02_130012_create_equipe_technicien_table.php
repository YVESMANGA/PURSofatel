<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('equipe_technicien', function (Blueprint $table) {
        $table->id();
        $table->foreignId('equipe_disponible_id')->constrained()->onDelete('cascade');
        $table->foreignId('technicien_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipe_technicien');
    }
};
