<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    //
    protected $fillable = [
        'nd',
        'zone',
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
        'id_ot',
        'fichier_importe_id',
    ];

}
