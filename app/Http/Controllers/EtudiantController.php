<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\DemandeAffiliationUniversite;
use App\Models\Etudiant;
use App\Models\Event;
use App\Models\Offre;
use App\Models\Postulation;
use App\Models\Universite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use function Livewire\of;

class EtudiantController extends Controller
{

    public function dashboard(): View
    {
        return view('etudiant.tableau-de-bord');
    }

    public function portfolio(Request $request, Etudiant $etudiant): View
    {
        $etudiant->load('user');
        return view('etudiant.portfolio', compact('etudiant'));
    }

    public function explorer_offre(): View
    {
        $offers = Offre::all();
        return view('etudiant.explorer-offres', compact('offers'));
    }

    public function show_offer(Request $request, Offre $offre) : View | RedirectResponse
    {
        $offre->load(['entreprise', 'etudiants']);
        return view('etudiant.show-offer', compact('offre'));
    }

    public function apply(Request $request, Offre $offre): RedirectResponse
    {
        $user = $request->user();
        $user->load('userable');
        // Check if the user has already applied for this offer
        if (Postulation::where('etudiant_id', $user->userable->id)->where('offre_id', $offre->id)->exists()) {
            return redirect()->back()->with('error', 'Vous avez déjà postuler pour ce poste!');
        }

        // Create a new application record
        Postulation::create([
            'etudiant_id' => $user->userable->id,
            'offre_id' => $offre->id,
        ]);

        return redirect()->back()->with('success', 'Candidature envoyé avec succès!');
    }

    public function mes_candidatures(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $user->userable->load('offres_postules');
        $candidatures = $user->userable->offres_postules;
        return view('etudiant.candidatures', compact('candidatures'));
    }

    public function annuler_postulation(Request $request): RedirectResponse
    {
        $id = $request->get('id');
        $postulation = Postulation::findOrFail((int) $id);
        $postulation->delete();
        return redirect()->back()->with('success', 'Candidature annulé avec succès!');
    }

    public function explorer_event(): View
    {
        $event_coming = Event::with('universite')->where('end_date', '>', now())
            ->orderBy('end_date', 'asc')
            ->limit(5)
            ->get();

        $event_passed = Event::with('universite')->where('end_date', '<', now())
            ->orderBy('end_date', 'desc')
            ->limit(5)
            ->get();

        return view('etudiant.evenements', compact('event_coming', 'event_passed'));
    }

    public function mot_de_passe(): View
    {
        return view('etudiant.motdepasse');
    }

    public function postuler_offre(Request $request, Offre $offre): View
    {
        return view('etudiant.postuler');
    }

    public function demander_affiliation_get(): View
    {
        $universites = Universite::whereHas('user', function ($query) {
            $query->where('is_accepted_by_admin', '=', 1);
        })->get(['nom_etablissement', 'id']);
        return view('etudiant.demande-affiliation-univ', compact('universites'));
    }

    public function demander_affiliation_post(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'universite_id' => 'required|integer',
            'matricule' => 'required|string',
            'document_scolaire' => 'required',
        ]);

        $user = $request->user();
        $user->load('userable');

        if ($request->hasFile('document_scolaire')) {
            $validatedData['document_scolaire'] = Storage::disk('public')->put('document_scolaire', $request->file('document_scolaire'));
        } else {
            return back()->withErrors([
                'document_scolaire' => 'Erreur lors de l\'importation du document scolaire'
            ]);
        }

        $validatedData['etudiant_id'] = $user->userable->id;

        DemandeAffiliationUniversite::create($validatedData);

        return redirect()->back()->with('success', 'Votre demande a été bien envoyé');
    }
}
