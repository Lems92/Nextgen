<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function Livewire\of;

class EtudiantController extends Controller
{

    public function dashboard(): View
    {
        return view('etudiant.tableau-de-bord');
    }

    public function portfolio(Request $request): View
    {
        $etudiant = $request->user();
        $etudiant->load('userable');
        return view('etudiant.portfolio', compact('etudiant'));
    }

    public function explorer_offre(): View
    {
        $offers = Offre::all();
        return view('etudiant.explorer-offres', compact('offers'));
    }

    public function mes_candidatures(): View
    {
        return view('etudiant.candidatures');
    }

    public function explorer_event(): View
    {
        return view('etudiant.evenements');
    }

    public function mot_de_passe(): View
    {
        return view('etudiant.motdepasse');
    }

    public function postuler_offre(Request $request, Offre $offre): View
    {
        return view('etudiant.postuler');
    }
}
