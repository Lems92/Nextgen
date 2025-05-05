<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\DemandeAffiliationUniversite;
use App\Models\Etudiant;
use App\Models\EtudiantUniversite;
use App\Models\Event;
use App\Models\Offre;
use App\Models\Parametrage;
use App\Models\User;
use App\Models\Postulation;
use App\Models\ListCategorie;   
use App\Models\Universite;
use App\Models\Entreprise;
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
    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);

        // Supprimer l'utilisateur associé
        if ($etudiant->user) {
            $etudiant->user->delete();
        }

        // Supprimer l'étudiant
        $etudiant->delete();

        // Rediriger avec un message de succès
        return redirect()->route('admin.dashboard')->with('success', 'Étudiant et utilisateur associé supprimés avec succès.');
    }

    public function portfolio(Request $request, Etudiant $etudiant): View
    {
        $etudiant->load(['user', 'universite']); // Charge l'université associée

        // Vérifiez si le champ est une chaîne JSON avant de le décoder
        if (is_string($etudiant->type_emploi_recherche)) {
            $decodedOnce = json_decode($etudiant->type_emploi_recherche, true);
            if (is_string($decodedOnce)) {
                // Si le résultat du premier décodage est encore une chaîne JSON, décodez à nouveau
                $etudiant->type_emploi_recherche = json_decode($decodedOnce, true);
            } else {
                $etudiant->type_emploi_recherche = $decodedOnce ?? [];
            }
        } else {
            $etudiant->type_emploi_recherche = $etudiant->type_emploi_recherche ?? [];
        }
        if (is_string($etudiant->secteur_activite_preferer)) {
            $etudiant->secteur_activite_preferer = json_decode($etudiant->secteur_activite_preferer, true);
        }
        if (is_string($etudiant->competences_techniques)) {
            $etudiant->competences_techniques = json_decode($etudiant->competences_techniques, true);
            
        }
        if (is_string($etudiant->competences_en_recherche_et_analyse)) {
            $etudiant->competences_en_recherche_et_analyse = json_decode($etudiant->competences_en_recherche_et_analyse, true);
        }
        if (is_string($etudiant->competences_en_communication)) {
            $etudiant->competences_en_communication = json_decode($etudiant->competences_en_communication, true);
        }
        //dd($etudiant);

        return view('etudiant.portfolio', compact('etudiant'));
    }

    public function explorer_offre(): View
    {
        $offers = Offre::orderBy('mise_en_avant', 'desc')
                      ->orderBy('created_at', 'desc')
                      ->get();
        return view('etudiant.explorer-offres', compact('offers'));
    }

    public function show_offer(Request $request, Offre $offre) : View | RedirectResponse
    {
        $offre->increment('views');
        $offre->load(['entreprise', 'etudiants']);
        return view('etudiant.show-offer', compact('offre'));
    }

    public function apply(Request $request, Offre $offre): RedirectResponse
    {
        $user = $request->user();
        $user->load('userable');
        // Check if the user has already applied for this offer
        if (Postulation::where('etudiant_id', $user->userable->id)->where('offre_id', $offre->id)->exists()) {
            return redirect()->back()->with('error', 'Vous avez déjà postulé pour ce poste!');
        }

        // Create a new application record
        Postulation::create([
            'etudiant_id' => $user->userable->id,
            'offre_id' => $offre->id,
        ]);

        return redirect()->back()->with('success', 'Candidature envoyée avec succès!');
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
        // Récupérer l'ID de la candidature depuis la requête
        $id = $request->get('id');

        // Trouver la candidature ou retourner une erreur 404
        $postulation = Postulation::findOrFail((int) $id);

        // Supprimer la candidature
        $postulation->delete();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Candidature annulée avec succès !');
    }

    public function explorer_event(): View
    {
        $event_coming = Event::with('universite')
            ->where('end_date', '>', now())
            ->orderBy('start_date', 'asc')
            ->get();

        $event_passed = Event::with('universite')
            ->where('end_date', '<', now())
            ->orderBy('start_date', 'desc')
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
            return redirect()->intended(route('etudiant.mon_universite'))->with('waring', 'Vous êtes déjà affilié à une université');
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

        return redirect()->back()->with('success', 'Votre demande a été bien envoyée');
    }

    public function delete_affiliation(Request $request): RedirectResponse
    {
        if($request->has('etu_univ_id')) {
            $etu_univ = EtudiantUniversite::findOrFail($request->etu_univ_id);
            $etu_univ->delete();
        }
        return redirect()->back()->with('success', 'L\'affiliation a été supprimée avec succès !');
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
            'numero_telephone' => 'required|string|max:20',
            'date_naissance' => 'required|date',
            'genre' => 'required|string',
            'adresse_postale' => 'nullable|string|max:255',
            'pays' => 'nullable|string',
            'region' => 'nullable|string',
            'ville' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:10',
            'univ' => 'nullable|string|max:255',
            'nom_ecole_universite' => 'nullable|string|max:255',
            'domaine_etudes' => 'nullable|string|max:255',
            'niveau_etudes' => 'nullable|string|max:255',
            'annee_obtention_diplome' => 'nullable|integer',
            'competences_techniques' => 'nullable|string',
            'competences_techniques' => 'nullable|array',
            'competences_en_recherche_et_analyse' => 'nullable|string',
            'competences_en_recherche_et_analyse' => 'nullable|array',
            'competences_en_communication' => 'nullable|string',
            'competences_interpersonnelles' => 'nullable|string',
            'competences_resolution_problemes' => 'nullable|string',
            'competences_adaptabilite' => 'nullable|string',
            'competences_gestion_stress' => 'nullable|string',
            'competences_leadership' => 'nullable|string',
            'competences_ethique_responsabilite' => 'nullable|string',
            'competences_gestion_financiere' => 'nullable|string',
            'competences_langues' => 'nullable|string',
            'competences_langues' => 'nullable|array',
            'autres_competences' => 'nullable|string',
            'experiences_academique' => 'nullable|string',	
            'experience_professionnelle' => 'nullable|string',
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
        $validatedData['competences_techniques'] = $request->input('competences_techniques');
        $validatedData['competences_en_recherche_et_analyse'] = $request->input('competences_en_recherche_et_analyse', []);
        $validatedData['competences_en_communication'] = $request->input('competences_en_communication', []);
        $validatedData['competences_langues'] = $request->input('competences_langues', []);
        //$validatedData['competences_techniques'] = trim($request->input('competences_techniques'));
        //$validatedData['autres_competences'] = json_encode($request->input('autres_competences', []));
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

        $etudiant->accessibilite = $request->accessibilite; // où le select envoie "oui"/"non"
        $etudiant->conditions_vie_specifiques = $request->conditions_vie_specifiques;
        $etudiant->statut_socio_economique = $request->statut_socio_economique;
        $etudiant->religion_belief = $request->religion_belief;
        $etudiant->save();
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

    public function editProfile(): View
    {
        // Récupérer l'utilisateur connecté
        $etudiant = Auth::user()->userable;
        
        if (!$etudiant) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }
        // Charger les relations nécessaires
        $parametrage = Parametrage::where('table', 'type_contrat')->get();     
        $parametrages = Parametrage::whereIn('table', [
            'competence_technique',
            'competence_transversale',
            'competence_linguistique',
        ])->get();   
        $competences_techniques = $parametrages->where('table', 'competence_technique');
        $competences_transversales = $parametrages->where('table', 'competence_transversale');
        $competences_langues = $parametrages->where('table', 'competence_linguistique');
        $typeEmploiDescriptions = Parametrage::getDescriptionsByTable('type_contrat');
        $list_categories = ListCategorie::where('table', 'secteur_activites')->get();

        //dd($competences_techniques, $competences_transversales, $competences_langues);
        //dd($etudiant->accessibilite);
        // Convertir les champs JSON ou chaînes en tableaux
        $etudiant->competences_techniques = is_string($etudiant->competences_techniques) 
            ? json_decode($etudiant->competences_techniques, true) ?? explode(',', $etudiant->competences_techniques) 
            : $etudiant->competences_techniques;

        // Vérifier et corriger le double encodage pour type_emploi_recherche
        if (is_string($etudiant->type_emploi_recherche)) {
            $decodedOnce = json_decode($etudiant->type_emploi_recherche, true);
            if (is_string($decodedOnce)) {
                // Si le résultat du premier décodage est encore une chaîne JSON, décodez à nouveau
                $etudiant->type_emploi_recherche = json_decode($decodedOnce, true);
            } else {
                $etudiant->type_emploi_recherche = $decodedOnce ?? [];
            }
        } else {
            $etudiant->type_emploi_recherche = $etudiant->type_emploi_recherche ?? [];
        }

        $etudiant->competences_en_recherche_et_analyse = is_string($etudiant->competences_en_recherche_et_analyse) 
            ? json_decode($etudiant->competences_en_recherche_et_analyse, true) ?? explode(',', $etudiant->competences_en_recherche_et_analyse) 
            : $etudiant->competences_en_recherche_et_analyse;

        $etudiant->competences_en_communication = is_string($etudiant->competences_en_communication) 
            ? json_decode($etudiant->competences_en_communication, true) ?? explode(',', $etudiant->competences_en_communication) 
            : $etudiant->competences_en_communication;

        $etudiant->competences_langues = is_string($etudiant->competences_langues) 
            ? json_decode($etudiant->competences_langues, true) ?? explode(',', $etudiant->competences_langues) 
            : $etudiant->competences_langues;

        $etudiant->autres_competences = is_string($etudiant->autres_competences) 
            ? json_decode($etudiant->autres_competences, true) ?? explode(',', $etudiant->autres_competences) 
            : $etudiant->autres_competences;
        $typeEmploiRecherche = is_string($etudiant->type_emploi_recherche)
            ? json_decode($etudiant->type_emploi_recherche, true)
            : ($etudiant->type_emploi_recherche ?? []);
        //dd(($parametrage));

        
        //dd($etudiant->religion_belief);
        // Retourner la vue avec les données de l'étudiant
        return view('etudiant.modifierProfil', compact('etudiant','typeEmploiDescriptions','typeEmploiRecherche','list_categories','parametrage','competences_techniques',
        'competences_transversales',
        'competences_langues'));
    }

    public function fixDoubleEncodedData()
    {
        $etudiants = Etudiant::all();

        foreach ($etudiants as $etudiant) {
            if (is_string($etudiant->type_emploi_recherche)) {
                $decodedOnce = json_decode($etudiant->type_emploi_recherche, true);
                if (is_string($decodedOnce)) {
                    // Si le résultat du premier décodage est encore une chaîne JSON, décodez à nouveau
                    $etudiant->type_emploi_recherche = json_encode(json_decode($decodedOnce, true));
                    $etudiant->save();
                }
            }
        }

        return "Correction terminée.";
    }
}
