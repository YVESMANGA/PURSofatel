<?php

namespace App\Imports;

use App\Models\Demande;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class DemandesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

         // Debug pour voir les entêtes réelles
         dd($row); // Active-le pour voir les vraies clés si ça bug encore
        return new Demande([
            'nd' => $row['ND'],
        'zone' => $row['ZONE'] ?? null,
        'priorite_traitement' => $row['PRIORITE_TRAITEMENT'] ?? null,
        'origine' => $row['ORIGINE'] ?? null,
        'offre' => $row['OFFRE'] ?? null,
        'type_techno' => $row['TYPE_TECHNO'] ?? null,
        'produit' => $row['PRODUIT'] ?? null,
        'rep_srp' => $row['REP_SRP'] ?? null,
        'constitution' => $row['CONSTITUTION'] ?? null,
        'specialite' => $row['SPECIALITE'] ?? null,
        'resultat_essai' => $row['RESULTAT_ESSAI'] ?? null,
        'commentaire_essai' => $row['COMMENTAIRE_ESSAI'] ?? null,
        'agent_essai' => $row['AGENT_ESSAI'] ?? null,
        'date_demande_intervention' => $row['DATE_DEMANDE_INTERVENTION'] ?? null,
        'commentaire_interv' => $row['COMMENTAIRE_INTERV'] ?? null,
        'id_ot' => $row['ID_OT'] ?? null,
        'fichier_importe_id' => $this->fichierImporteId, // si tu l'utilises
        ]);
    }
}
