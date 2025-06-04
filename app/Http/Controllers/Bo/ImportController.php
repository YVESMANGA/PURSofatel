<?php

namespace App\Http\Controllers\Bo;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\DemandesImport;
use App\Models\FichierImporte;
use App\Models\User;

class ImportController extends Controller
{
    //
    public function showForm()
    {
        $fichier = FichierImporte::findOrFail($id);
        $demandes = $fichier->demandes()->paginate(50);
        return view('import.form');
    }

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
    




}
