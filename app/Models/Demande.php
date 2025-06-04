<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    //
    protected $fillable = [
        'nd',
        'zone',
<<<<<<< HEAD
        'priorite_de_traitement',
        'origine',
        'offre',
        'type',
        'cas_artp',
        'produit',
        'rep_srp',
        'constitution',
        'olt',
        'position_olt',
        'complexite',
        'ui',
        'date_sig',
        'age',
        'plage',
        'porteur',
        'direction',
        'service',
        'gps',
        'id_drgt',
        'service_techn',
        'ncli',
        'nd2',
        'etat_dossier',
        'produit2',
        'compteur',
        'nom_du_client',
        'prenom_du_client',
        'contact_client',
        'commentaire_contact',
        'c_gest',
        'segment',
        'categorie',
        'date_msv_acces_reseau',
        'acces_rx',
        'date_resil_acces_rx',
        'etat_drgt',
        'date_si',
        'option_atr_h',
        'date_releve_prevision',
        'respect_delai',
        'agent_sig',
        'libel_orig',
        'libel_sig',
        'commentaire_sig',
        'ss_reseau',
        'secteur_geo',
        'zone_rs',
        'libelle_commune',
        'libelle_quartier',
        'libelle_voie',
        'nvoie',
        'id_drgt_collectif',
        'date_ess',
        'priorite_drgt',
        'priorite_serv',
        'specialite_choisie',
        'result_ess',
        'commentaire_essai',
        'agent_ess',
        'date_demande_int',
        'commentaire_interv',
        'agent_dem_int',
=======
        'priorite_traitement',
        'origine',
        'offre',
        'type_techno',
        'produit',
        'rep_srp',
        'constitution',
        'specialite',
        'resultat_essai',
        'commentaire_essai',
        'agent_essai',
        'date_demande_intervention',
        'commentaire_interv',
>>>>>>> b6b4f3f1acbfcbbc50dbb2dd95d6d81f137130dc
        'id_ot',
        'fichier_importe_id',
    ];

<<<<<<< HEAD
    protected $dates = [
        'date_sig',
        'date_msv_acces_reseau',
        'date_resil_acces_rx',
        'date_si',
        'date_releve_prevision',
        'date_ess',
        'date_demande_int',
        'created_at',
        'updated_at',
    ];

    // Relation vers le fichier importé
    public function fichierImporte()
    {
        return $this->belongsTo(FichierImporte::class, 'fichier_importe_id');
    }

=======
>>>>>>> b6b4f3f1acbfcbbc50dbb2dd95d6d81f137130dc
}
