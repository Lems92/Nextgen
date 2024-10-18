<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Offre;
use App\Models\Parametrage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EntrepriseController extends Controller
{
    public function dashboard(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $offres = Offre::where('entreprise_id', '=', $user->userable->id)->limit(3)->get();
        return view('entreprise.tableau-de-bord', compact('offres'));
    }

    public function offres(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $entreprise = $user->userable;
        $entreprise->load('offres');
        $entreprise->offres->load('etudiants');
        return view('entreprise.offres', [
            'offres' => $entreprise->offres
        ]);
    }

    public function publier_offre(): View
    {
        $parametres_tables = [
            'type_contrat', 'duree_contrat', 'lieu_poste',
            'competence_technique', 'competence_transversale', 'competence_linguistique'
        ];
        $parametres = Parametrage::whereIn('table', $parametres_tables)->get()->groupBy('table');

        $type_contrats = $parametres->get('type_contrat');
        $duree_contrats = $parametres->get('duree_contrat');
        $lieu_postes = $parametres->get('lieu_poste');
        $competences_techniques = $parametres->get('competence_technique');
        $competences_transversales = $parametres->get('competence_transversale');
        $langues = $parametres->get('competence_linguistique');

        return view('entreprise.publier-une-offre', compact([
            'type_contrats', 'duree_contrats', 'lieu_postes',
            'competences_techniques', 'competences_transversales', 'langues'
        ]));
    }

    public function validate_publier_offre(Request $request): RedirectResponse
    {
        // Validation des données
        $entrepriseId = $request->user()->userable->id;

        $validatedData = $request->validate([
            'titre_poste' => 'required|string|max:255',
            'type_contrat' => 'required|string',
            'duree_contrat' => 'required|string',
            'lieu_poste' => 'required|string',
            'date_debut' => 'required|date',
            'description_poste' => 'required|string',
            'competences_techniques' => 'required|array',
            'competences_transversales' => 'required|array',
            'langues_requises' => 'required|array',
            'avantages' => 'nullable|string',
            'date_limite_candidature' => 'required|date',
        ]);

        $validatedData['entreprise_id'] = $entrepriseId;

        Offre::create($validatedData);

        return redirect()->route('entreprise.offres')
            ->with('success', 'Offre publiée avec succès');
    }

    public function show_offre(Request $request, Offre $offre) : View | RedirectResponse
    {
        $offre->load('etudiants');
        return view('entreprise.show-offres', compact('offre'));
    }

    public function edit_offre(Request $request, Offre $offre): View
    {
        $parametres_tables = [
            'type_contrat', 'duree_contrat', 'lieu_poste',
            'competence_technique', 'competence_transversale', 'competence_linguistique'
        ];
        $parametres = Parametrage::whereIn('table', $parametres_tables)->get()->groupBy('table');

        $type_contrats = $parametres->get('type_contrat');
        $duree_contrats = $parametres->get('duree_contrat');
        $lieu_postes = $parametres->get('lieu_poste');
        $competences_techniques = $parametres->get('competence_technique');
        $competences_transversales = $parametres->get('competence_transversale');
        $langues = $parametres->get('competence_linguistique');

        return view('entreprise.publier-une-offre', compact([
            'type_contrats', 'duree_contrats', 'lieu_postes',
            'competences_techniques', 'competences_transversales', 'langues', 'offre'
        ]));
    }

    public function update_offre(Request $request, Offre $offre): RedirectResponse
    {
        $validatedData = $request->validate([
            'titre_poste' => 'required|string|max:255',
            'type_contrat' => 'required|string',
            'duree_contrat' => 'required|string',
            'lieu_poste' => 'required|string',
            'date_debut' => 'required|date',
            'description_poste' => 'required|string',
            'competences_techniques' => 'required|array',
            'competences_transversales' => 'required|array',
            'langues_requises' => 'required|array',
            'avantages' => 'nullable|string',
            'date_limite_candidature' => 'required|date',
        ]);

        $offre->update($validatedData);

        return redirect()->route('entreprise.offres')
            ->with('success', 'Offre modifiée avec succès');
    }

    public function delete_offre(Request $request, Offre $offre): RedirectResponse
    {
        $offre->delete();
        return redirect()->route('entreprise.offres')
            ->with('success', 'Offre supprimée avec succès');
    }

    public function gerer_candidat(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $entreprise = $user->userable;
        $entreprise->load('offres');
        $candidats = [];
        foreach ($entreprise->offres as $offre) {
            foreach ($offre->etudiants as $etudiant) {
                $candidats[] = [
                    'offre' => $offre,
                    'etudiant' => $etudiant
                ];
            }
        }
        return view('entreprise.gerer-candidat', compact('candidats'));
    }

    public function page_entreprise(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $entreprise = Entreprise::with(['user', 'offres'])->findOrFail($user->userable->id);
        return view('entreprise.page-entreprise', compact('entreprise'));
    }

    public function public_show_entreprise(Request $request, Entreprise $entreprise): View | RedirectResponse
    {
        $entreprise->load(['user', 'offres']);

        if($entreprise->user->hasPermissionTo('page_presentation_entreprise')) {
            return view('entreprise.page-entreprise', compact('entreprise'));
        }

        return redirect()->back()->with('error', 'L\'entreprise que vous essayez de voir ne dispose pas les permissions necessaires pour ce fonctionnalité!');
    }

    public function shortlist_vip(): View
    {
        return view('entreprise.shortlist-vip');
    }

    public function mon_abonnement(): View
    {
        return view('entreprise.mon-abonnement');
    }

}
