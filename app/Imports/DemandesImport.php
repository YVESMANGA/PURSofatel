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
        // Fonction anonyme pour convertir la date Excel en string SQL ou retourner null
        $convertDate = function($value) {
            if (empty($value)) return null;
            return is_numeric($value) ? Date::excelToDateTimeObject($value)->format('Y-m-d') : $value;
        };

        foreach ($rows as $row) {
            Demande::create([
                'nd' => $row['nd'] ?? null,
                'zone' => $row['zone'] ?? null,
                'priorite_de_traitement' => $row['priorite_de_traitement'] ?? null,
                'origine' => $row['origine'] ?? null,
                'offre' => $row['offre'] ?? null,
                'type' => $row['type'] ?? null,
                'cas_artp' => $row['cas_artp'] ?? null,
                'produit' => $row['produit'] ?? null,
                'rep_srp' => $row['rep_srp'] ?? null,
                'constitution' => $row['constitution'] ?? null,
                'olt' => $row['olt'] ?? null,
                'position_olt' => $row['position_olt'] ?? null,
                'complexite' => $row['complexite'] ?? null,
                'ui' => $row['ui'] ?? null,
                'date_sig' => $convertDate($row['date_sig'] ?? null),
                'age' => $row['age'] ?? null,
                'plage' => $row['plage'] ?? null,
                'porteur' => $row['porteur'] ?? null,
                'direction' => $row['direction'] ?? null,
                'service' => $row['service'] ?? null,
                'gps' => $row['gps'] ?? null,
                'id_drgt' => $row['id_drgt'] ?? null,
                'service_techn' => $row['service_techn'] ?? null,
                'ncli' => $row['ncli'] ?? null,
                'nd2' => $row['nd2'] ?? null,
                'etat_dossier' => $row['etat_dossier'] ?? null,
                'produit2' => $row['produit2'] ?? null,
                'compteur' => $row['compteur'] ?? null,
                'nom_du_client' => $row['nom_du_client'] ?? null,
                'prenom_du_client' => $row['prenom_du_client'] ?? null,
                'contact_client' => $row['contact_client'] ?? null,
                'commentaire_contact' => $row['commentaire_contact'] ?? null,
                'c_gest' => $row['c_gest'] ?? null,
                'segment' => $row['segment'] ?? null,
                'categorie' => $row['categorie'] ?? null,
                'date_msv_acces_reseau' => $convertDate($row['date_msv_acces_reseau'] ?? null),
                'acces_rx' => $row['acces_rx'] ?? null,
                'date_resil_acces_rx' => $convertDate($row['date_resil_acces_rx'] ?? null),
                'etat_drgt' => $row['etat_drgt'] ?? null,
                'date_si' => $convertDate($row['date_si'] ?? null),
                'option_atr_h' => $row['option_atr_h'] ?? null,
                'date_releve_prevision' => $convertDate($row['date_releve_prevision'] ?? null),
                'respect_delai' => $row['respect_delai'] ?? null,
                'agent_sig' => $row['agent_sig'] ?? null,
                'libel_orig' => $row['libel_orig'] ?? null,
                'libel_sig' => $row['libel_sig'] ?? null,
                'commentaire_sig' => $row['commentaire_sig'] ?? null,
                'ss_reseau' => $row['ss_reseau'] ?? null,
                'secteur_geo' => $row['secteur_geo'] ?? null,
                'zone_rs' => $row['zone_rs'] ?? null,
                'libelle_commune' => $row['libelle_commune'] ?? null,
                'libelle_quartier' => $row['libelle_quartier'] ?? null,
                'libelle_voie' => $row['libelle_voie'] ?? null,
                'nvoie' => $row['nvoie'] ?? null,
                'id_drgt_collectif' => $row['id_drgt_collectif'] ?? null,
                'date_ess' => $convertDate($row['date_ess'] ?? null),
                'priorite_drgt' => $row['priorite_drgt'] ?? null,
                'priorite_serv' => $row['priorite_serv'] ?? null,
                'specialite_choisie' => $row['specialite_choisie'] ?? null,
                'result_ess' => $row['result_ess'] ?? null,
                'commentaire_essai' => $row['commentaire_essai'] ?? null,
                'agent_ess' => $row['agent_ess'] ?? null,
                'date_demande_int' => $convertDate($row['date_demande_int'] ?? null),
                'commentaire_interv' => $row['commentaire_interv'] ?? null,
                'agent_dem_int' => $row['agent_dem_int'] ?? null,
                'id_ot' => $row['id_ot'] ?? null,
                'fichier_importe_id' => $this->fichierImporteId,
            ]);
        }
    }
}
