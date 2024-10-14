<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Offre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function show(Request $request, Offre $offre) : View | RedirectResponse
    {
        return view('etudiant.show-offer', compact('offre'));
    }

    public function apply(Request $request, Offre $offre): RedirectResponse
    {
        // Check if the user has already applied for this offer
        if (Application::where('user_id', Auth::id())->where('offre_id', $id)->exists()) {
            return redirect()->back()->with('error', 'You have already applied for this job');
        }

        // Create a new application record
        Application::create([
            'user_id' => Auth::id(),
            'offre_id' => $id,
        ]);

        return redirect()->route('offers.index')->with('success', 'Application submitted successfully');
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
