<?php

namespace App\Http\Controllers\Bo;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\DemandesImport;

class ImportController extends Controller
{
    //
    public function showForm()
    {
        return view('import.form');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new DemandesImport, $request->file('file'));

        return back()->with('success', 'Importation réussie !');
    }
}
