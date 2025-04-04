<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\DemandeAffiliationUniversite;
use App\Models\Etudiant;
use App\Models\EtudiantUniversite;
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
use Illuminate\Support\Facades\DB;

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


    public function mon_universite(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $etudiant = $user->userable;

        $universite_univ = EtudiantUniversite::with('universite')->where('etudiant_id', '=', $etudiant->id)->first();

        $universite = $universite_univ?->universite;
        $etudiant_univ_id = $universite_univ?->id;

        return view("etudiant.mon-universite", compact('universite', 'etudiant_univ_id'));
    }

    public function demander_affiliation_get(Request $request): View | RedirectResponse
    {
        // si l'utilisateur est affilié à un univ
        $user = $request->user();
        $user->load('userable');
        $est_deja_affilie_univ = EtudiantUniversite::where('etudiant_id', '=', $user->userable->id)->count();
        if($est_deja_affilie_univ > 0) {
            return redirect()->intended(route('etudiant.mon_universite'))->with('waring', 'Vous êtes déjà affilié à un université');
        }

        $universites = Universite::whereHas('user', function ($query) {
            $query->where('is_accepted_by_admin', '=', 1);
        })->get(['nom_etablissement', 'id']);
        return view('etudiant.demande-affiliation-univ', compact('universites'));
    }

    public function demander_affiliation_post(Request $request): RedirectResponse
    {
        // si l'utilisateur est affilié à un univ
        $user = $request->user();
        $user->load('userable');
        $est_deja_affilie_univ = EtudiantUniversite::where('etudiant_id', '=', $user->userable->id)->count();
        if($est_deja_affilie_univ > 0) {
            return redirect()->intended(route('etudiant.mon_universite'))->with('waring', 'Vous êtes déjà affilié à un université');
        }

        $validatedData = $request->validate([
            'universite_id' => 'required|integer',
            'matricule' => 'required|string',
            'document_scolaire' => 'required',
        ]);


        $user = $request->user();
        $user->load('userable');

        //si une demande a déjà été envoyé à l'université
        $demande_exist = DemandeAffiliationUniversite::where('universite_id', '=',$validatedData['universite_id'])
            ->where('etudiant_id', '=', $user->userable->id)->count();

        if($demande_exist > 0 ) {
            return redirect()->back()->with('warning', 'Vous avez déjà envoyé une demande à cette université!');
        }

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

    public function delete_affiliation(Request $request): RedirectResponse
    {
        if($request->has('etu_univ_id')) {
            $etu_univ = EtudiantUniversite::findOrFail($request->etu_univ_id);
            $etu_univ->delete();
        }
        return redirect()->back()->with('success', 'L\'affiliation a été supprimé avec succès !');
    }

    public function showInscriptionForm(): View
    {
        $genres = [
            (object) ['sigle' => 'M', 'libelle' => 'Masculin'],
            (object) ['sigle' => 'F', 'libelle' => 'Féminin']
        ];
        $mada_regions = ['Antananarivo', 'Fianarantsoa', 'Toamasina', 'Mahajanga', 'Toliara', 'Antsiranana'];
        $france_regions = ['Île-de-France', 'Provence-Alpes-Côte d\'Azur', 'Auvergne-Rhône-Alpes'];

        return view('inscription.form-etudiant', compact('genres', 'mada_regions', 'france_regions'));
    }

    public function storeInscription(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'numero_telephone' => 'required|string|max:20',
            'date_naissance' => 'required|date',
            'genre' => 'required|string|max:10',
            'adresse_postale' => 'required|string|max:255',
            'pays' => 'required|string|max:50',
            'region' => 'required|string|max:50',
            'ville' => 'required|string|max:100',
            'code_postal' => 'required|string|max:10',
        ]);

        Etudiant::create($validatedData);

        return redirect()->route('inscription.etudiant.success')->with('success', 'Inscription réussie!');
    }

    public function updateProfile(Request $request)
    {
        // Activer le Query Log
        DB::enableQueryLog();
        
        $request->merge([
            'accessibilite' => $request->accessibilite === 'oui' ? true : false,
        ]);

        // Valider les données
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'numero_telephone' => 'required|string|max:20',
            'date_naissance' => 'required|date',
            'genre' => 'required|string',
            'adresse_postale' => 'nullable|string|max:255',
            'pays' => 'nullable|string',
            'region' => 'nullable|string',
            'ville' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:10',
            'nom_ecole_universite' => 'nullable|string|max:255',
            'domaine_etudes' => 'nullable|string|max:255',
            'niveau_etudes' => 'nullable|string|max:255',
            'annee_obtention_diplome' => 'nullable|integer',
            'competences_techniques' => 'nullable|string|max:4294967295',
            'competences_en_recherche_et_analyse' => 'nullable|string|max:4294967295',
            'competences_en_communication' => 'nullable|string|max:4294967295',
            'competences_interpersonnelles' => 'nullable|string|max:4294967295',
            'competences_resolution_problemes' => 'nullable|string|max:4294967295',
            'competences_adaptabilite' => 'nullable|string|max:4294967295',
            'competences_gestion_stress' => 'nullable|string|max:4294967295',
            'competences_leadership' => 'nullable|string|max:4294967295',
            'competences_ethique_responsabilite' => 'nullable|string|max:4294967295',
            'competences_gestion_financiere' => 'nullable|string|max:4294967295',
            'competences_langues' => 'nullable|string|max:4294967295',
            'experience_professionnelle' => 'nullable|string|max:4294967295',
            'portfolio' => 'nullable|string',
            'centres_interet' => 'nullable|string',
            'document_diplome' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'document_recommandation' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'secteur_activite_preferer' => 'nullable|array',
            'type_emploi_recherche' => 'nullable|array',
            'localisation_geographique_preferee' => 'nullable|string',
            'duree_disponibilite' => 'nullable|string',
            'semestre_cours' => 'nullable|string',
            'vacances_ete_debut' => 'nullable|date',
            'vacances_ete_fin' => 'nullable|date',
            'dates_disponibles_vacances_ete_debut' => 'nullable|date',
            'dates_disponibles_vacances_ete_fin' => 'nullable|date',
            'accessibilite' => 'required|boolean',
            'details_accessibilite' => 'nullable|string',
            'origine_ethnique' => 'nullable|string',
            'statut_socio_economique' => 'nullable|string',
            'conditions_vie_specifiques' => 'nullable|string',
            'religion_belief' => 'nullable|string',
            'orientation_sexuelle' => 'nullable|string',
            'profile_picture' => 'nullable|file|mimes:jpg,png|max:2048',
            'slug' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        $validatedData['secteur_activite_preferer'] = json_encode($request->input('secteur_activite_preferer', []));
        $validatedData['type_emploi_recherche'] = json_encode($request->input('type_emploi_recherche', []));
        $validatedData['competences_techniques'] = trim($request->input('competences_techniques'));// Récupérer l'utilisateur connecté
        
        // Gérer les fichiers téléchargés
        if ($request->hasFile('document_diplome')) {
            $validatedData['document_diplome'] = $request->file('document_diplome')->store('documents/diplomes', 'public');
        }
        
        if ($request->hasFile('document_recommandation')) {
            $validatedData['document_recommandation'] = $request->file('document_recommandation')->store('documents/recommandations', 'public');
        }
        
        if ($request->hasFile('profile_picture')) {
            $validatedData['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }
        $etudiant = Auth::user()->userable;

        if (!$etudiant) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }
        //dd($request->all());
        //dd($validatedData);
        // Mettre à jour les données
        $etudiant->update($validatedData);

        // Récupérer les requêtes exécutées
        //$queries = DB::getQueryLog();

        // Afficher la dernière requête et son résultat
        //dd([
        //    'requette' => end($queries),
        //    'resultat' => $etudiant->fresh(), // Récupérer les données mises à jour
        //]);

        // Rediriger avec un message de succès
        return redirect()->route('etudiants.edit_profile')->with('success', 'Profil mis à jour avec succès.');
    }
}
