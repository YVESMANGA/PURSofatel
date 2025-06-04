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
            $table->string('nd');
            $table->string('zone')->nullable();
            $table->string('priorite_de_traitement')->nullable();
            $table->string('origine')->nullable();
            $table->string('offre')->nullable();
            $table->string('type')->nullable();
            $table->string('cas_artp')->nullable();
            $table->string('produit')->nullable();
            $table->string('rep_srp')->nullable();
            $table->string('constitution')->nullable();
            $table->string('olt')->nullable();
            $table->string('position_olt')->nullable();
            $table->string('complexite')->nullable();
            $table->string('ui')->nullable();
            $table->date('date_sig')->nullable();
            $table->integer('age')->nullable();
            $table->string('plage')->nullable();
            $table->string('porteur')->nullable();
            $table->string('direction')->nullable();
            $table->string('service')->nullable();
            $table->string('gps')->nullable();
            $table->string('id_drgt')->nullable();
            $table->string('service_techn')->nullable();
            $table->string('ncli')->nullable();
            $table->string('nd2')->nullable();
            $table->string('etat_dossier')->nullable();
            $table->string('produit2')->nullable();
            $table->string('compteur')->nullable();
            $table->string('nom_du_client')->nullable();
            $table->string('prenom_du_client')->nullable();
            $table->string('contact_client')->nullable();
            $table->text('commentaire_contact')->nullable();
            $table->string('c_gest')->nullable();
            $table->string('segment')->nullable();
            $table->string('categorie')->nullable();
            $table->date('date_msv_acces_reseau')->nullable();
            $table->string('acces_rx')->nullable();
            $table->date('date_resil_acces_rx')->nullable();
            $table->string('etat_drgt')->nullable();
            $table->date('date_si')->nullable();
            $table->string('option_atr_h')->nullable();
            $table->date('date_releve_prevision')->nullable();
            $table->string('respect_delai')->nullable();
            $table->string('agent_sig')->nullable();
            $table->string('libel_orig')->nullable();
            $table->string('libel_sig')->nullable();
            $table->text('commentaire_sig')->nullable();
            $table->string('ss_reseau')->nullable();
            $table->string('secteur_geo')->nullable();
            $table->string('zone_rs')->nullable();
            $table->string('libelle_commune')->nullable();
            $table->string('libelle_quartier')->nullable();
            $table->string('libelle_voie')->nullable();
            $table->string('nvoie')->nullable();
            $table->string('id_drgt_collectif')->nullable();
            $table->date('date_ess')->nullable();
            $table->string('priorite_drgt')->nullable();
            $table->string('priorite_serv')->nullable();
            $table->string('specialite_choisie')->nullable();
            $table->string('result_ess')->nullable();
            $table->text('commentaire_essai')->nullable();
            $table->string('agent_ess')->nullable();
            $table->dateTime('date_demande_int')->nullable();
            $table->text('commentaire_interv')->nullable();
            $table->string('agent_dem_int')->nullable();
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
