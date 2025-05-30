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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('nd')->unique(); // Numéro de demande
            $table->string('zone')->nullable();
            $table->string('priorite_traitement')->nullable();
            $table->string('origine')->nullable();
            $table->string('offre')->nullable();
            $table->string('type_techno')->nullable(); // Fibre, Cuivre, 5G…
            $table->string('produit')->nullable();
            $table->string('rep_srp')->nullable();
            $table->string('constitution')->nullable();
            $table->string('specialite')->nullable(); // SPECIALITE_CHOISIE
            $table->string('resultat_essai')->nullable();
            $table->text('commentaire_essai')->nullable();
            $table->string('agent_essai')->nullable();
            $table->dateTime('date_demande_intervention')->nullable();
            $table->text('commentaire_interv')->nullable();
            $table->unsignedBigInteger('id_ot')->nullable();

            $table->foreignId('fichier_importe_id')->constrained('fichier_importes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
