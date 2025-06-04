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
        Schema::table('equipe_disponibles', function (Blueprint $table) {
            // Étape 1 : Ajouter la colonne nullable pour ne pas casser la table si elle contient déjà des données
            $table->foreignId('section_id')->nullable()->constrained('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('equipe_disponibles', function (Blueprint $table) {
            $table->dropForeign(['section_id']);
            $table->dropColumn('section_id');
        });
    }
};
// Note: This migration adds a foreign key column 'section_id' to the 'equipe_disponibles' table, linking it to the 'sections' table.