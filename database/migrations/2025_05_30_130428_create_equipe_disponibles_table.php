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
        Schema::create('equipe_disponibles', function (Blueprint $table) {
            $table->id();
            $table->string('nom_equipe');
            $table->string('technologie');
            $table->string('service');
            $table->foreignId('chef_zone_id')->constrained('chef_zones')->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipe_disponibles');
    }
};
