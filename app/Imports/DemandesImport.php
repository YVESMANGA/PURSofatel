<?php
namespace App\Imports;

use App\Models\Demande;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class DemandesImport implements ToCollection, WithHeadingRow
{
    private $fichierImporteId;

    public function __construct($fichierImporteId)
    {
        $this->fichierImporteId = $fichierImporteId;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Convertir la date Excel en objet DateTime, ou null si vide
            $dateDemandeIntervention = isset($row['date_demande_int']) && !empty($row['date_demande_int'])
                ? Date::excelToDateTimeObject($row['date_demande_int'])
                : null;

            Demande::create([
                'nd' => $row['nd'] ?? null,
                'zone' => $row['zone'] ?? null,
                'priorite_traitement' => $row['priorite_de_traitement'] ?? null,
                'origine' => $row['origine'] ?? null,
                'offre' => $row['offre'] ?? null,
                'type_techno' => $row['type'] ?? null,
                'produit' => $row['produit'] ?? null,
                'rep_srp' => $row['rep_srp'] ?? null,
                'constitution' => $row['constitution'] ?? null,
                'specialite' => $row['specialite_choisie'] ?? null,
                'resultat_essai' => $row['result_ess'] ?? null,
                'commentaire_essai' => $row['commentaire_essai'] ?? null,
                'agent_essai' => $row['agent_ess'] ?? null,
                'date_demande_intervention' => $dateDemandeIntervention,
                'commentaire_interv' => $row['commentaire_interv'] ?? null,
                'id_ot' => $row['id_ot'] ?? null,
                'fichier_importe_id' => $this->fichierImporteId,
            ]);
        }
    }
}
