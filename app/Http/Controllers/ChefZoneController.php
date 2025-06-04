<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Technicien;
use App\Models\EquipeDisponible;
use App\Models\ChefZone;
use Illuminate\Http\Request;

class ChefZoneController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $techniciens = Technicien::all();
        $equipes = EquipeDisponible::with('techniciens')->get();

        return view('chefZone.index', compact('sections', 'techniciens', 'equipes'));
    }

    public function affecter(Request $request)
    {
        // ✅ Correction ici : relation directe via requête
        $chefZone = ChefZone::where('user_id', auth()->id())->first();

        

        if (!$chefZone) {
            return redirect()->back()->withErrors('⚠️ Vous n\'êtes pas un chef de zone valide.');
        }

        $request->validate([
            'section' => 'required|exists:sections,id',
            'techniciens' => 'required|array|min:1',
            'technologie' => 'required|in:cuivre,fibre,5G',
            'service' => 'required|in:SAV,PROD',
        ]);

        $equipe = EquipeDisponible::create([
            'nom_equipe' => 'Équipe Zone ' . $request->section,
            'technologie' => $request->technologie,
            'service' => $request->service,
            'chef_zone_id' => $chefZone->id,
            'section_id' => $request->section,
        ]);

        $equipe->techniciens()->attach($request->techniciens);

        return redirect()->route('chefZone.index')->with('success', '✅ Techniciens affectés avec succès.');
    }
    public function equipes()
{
    $equipes = EquipeDisponible::with(['techniciens', 'section', 'chefZone.user'])->get();

    return view('chefZone.equipes', compact('equipes'));
}

}
