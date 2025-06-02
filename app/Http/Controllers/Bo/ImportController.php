<?php

namespace App\Http\Controllers\Bo;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\DemandesImport;
use App\Models\FichierImporte;
use App\Models\Demande;
use App\Models\User;

class ImportController extends Controller
{
    //
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
    
        $fichier = FichierImporte::create([
            'nom_fichier' => $request->file('file')->getClientOriginalName(),
            'user_id' => auth()->id(),
        ]);
    
        Excel::import(new DemandesImport($fichier->id), $request->file('file'));
    
        return back()->with('success', 'Importation réussie !');
    }
    


    public function visualiser($id)
    {
        $fichier = FichierImporte::findOrFail($id);
        $demandes = Demande::where('fichier_importe_id', $id)->get();

        return view('bo.apercu', compact('fichier', 'demandes'));
    }

     public function dispatch($id)
    {
        $fichier = FichierImporte::findOrFail($id);
        $demandes = Demande::where('fichier_importe_id', $id)->get();

        return view('bo.dispatch', compact('fichier', 'demandes'));
    }


}
