<?php

namespace App\Http\Controllers\Bo;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\DemandesImport;
use App\Models\FichierImporte;
<<<<<<< HEAD
use App\Models\Demande;
=======
>>>>>>> b6b4f3f1acbfcbbc50dbb2dd95d6d81f137130dc
use App\Models\User;

class ImportController extends Controller
{
    //
<<<<<<< HEAD
=======
    public function showForm()
    {
        $fichier = FichierImporte::findOrFail($id);
        $demandes = $fichier->demandes()->paginate(50);
        return view('import.form');
    }

>>>>>>> b6b4f3f1acbfcbbc50dbb2dd95d6d81f137130dc
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
    


<<<<<<< HEAD
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
=======
>>>>>>> b6b4f3f1acbfcbbc50dbb2dd95d6d81f137130dc


}
