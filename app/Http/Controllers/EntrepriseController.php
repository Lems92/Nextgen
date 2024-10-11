<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Parametrage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EntrepriseController extends Controller
{
    public function dashboard(): View
    {
        return view('entreprise.tableau-de-bord');
    }

    public function offres(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $entreprise = $user->userable;
        $entreprise->load('offres');
        return view('entreprise.offres', [
            'offres' => $entreprise->offres
        ]);
    }

    public function publier_offre(): View
    {
        $type_contrats = Parametrage::where('table', 'LIKE', 'type_contrat')->get();
        $duree_contrats = Parametrage::where('table', 'LIKE', 'duree_contrat')->get();
        $lieu_postes = Parametrage::where('table', 'LIKE', 'lieu_poste')->get();
        $competences_techniques = Parametrage::where('table', 'LIKE', 'competence_technique')->get();
        $competences_transversales = Parametrage::where('table', 'LIKE', 'competence_transversale')->get();
        $langues = Parametrage::where('table', 'LIKE', 'competence_linguistique')->get();

        return view('entreprise.publier-une-offre', compact([
            'type_contrats', 'duree_contrats', 'lieu_postes',
            'competences_techniques', 'competences_transversales', 'langues'
        ]));
    }

    public function validate_publier_offre(Request $request)
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
        return view('entreprise.show-offres', compact('offre'));
    }
}
