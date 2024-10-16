<?php

namespace App\Http\Controllers;

use App\Models\ExperienceAcademique;
use App\Models\ExperienceProfessionnelle;
use App\Models\ListWithCategory;
use App\Models\ListCategorie;
use App\Models\Entreprise;
use App\Models\Etudiant;
use App\Models\Parametrage;
use App\Models\Subscription;
use App\Models\Universite;
use App\Models\User;
use App\Utils\Redirection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;


class RegistrationController extends Controller
{

    public function register_get(): View|RedirectResponse
    {
        if (Auth::check()) {
            $user = Auth::user();
            return redirect()->route(Redirection::redirect_if_authenticated($user));
        }
        return view('inscription.inscription');
    }

    public function register_post(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'role' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Stocker les données de la première étape dans la session
        Session::put('register_data', $request->only(['email', 'password', 'account_type']));

        // Rediriger vers la page appropriée en fonction du rôle
        return match ($validatedData['role']) {
            'etudiant' => redirect()->route('inscription.etudiant.get'),
            'entreprise' => redirect()->route('inscription.entreprise.get'),
            'service-carriere' => redirect()->route('inscription.service-carriere.get'),
            default => redirect()->route('home'),
        };
    }

    // inscription étudiant
    public function register_etudiant_get(): View|RedirectResponse
    {
        if (!Session::get('register_data')) {
            return redirect()->route('inscription');
        }
        if (Auth::check()) {
            $user = Auth::user();
            return redirect()->route(Redirection::redirect_if_authenticated($user));
        }

        $mada_regions = File::json(base_path("/resources/data/region_mada.json"));
        $france_regions = File::json(base_path("/resources/data/region_france.json"));
        $ethnies = File::json(base_path("/resources/data/foko.json"));

        $genres = Parametrage::where('table', 'LIKE', 'genre')->get();
        //$domaine_etudes = Parametrage::where('table', 'LIKE', 'domaine_etude')->get();
        $niveau_etudes = Parametrage::where('table', 'LIKE', 'niveau_etude')->get();
        $competences_techniques = Parametrage::where('table', 'LIKE', 'competence_technique')->get();
        $competences_en_recherche_et_analyse = Parametrage::where('table', 'LIKE', 'competences_en_recherche_et_analyse')->get();
        $competences_en_communication = Parametrage::where('table', 'LIKE', 'competences_en_communication')->get();
        $competences_interpersonnelles = Parametrage::where('table', 'LIKE', 'competences_interpersonnelles')->get();
        $competences_resolution_problemes = Parametrage::where('table', 'LIKE', 'competences_resolution_problemes')->get();
        $competences_adaptabilite = Parametrage::where('table', 'LIKE', 'competences_adaptabilite')->get();
        $competences_gestion_stress = Parametrage::where('table', 'LIKE', 'competences_gestion_stress')->get();
        $competences_leadership = Parametrage::where('table', 'LIKE', 'competences_leadership')->get();
        $competences_ethique_responsabilite = Parametrage::where('table', 'LIKE', 'competences_ethique_responsabilite')->get();
        $competences_gestion_financiere = Parametrage::where('table', 'LIKE', 'competences_gestion_financiere')->get();
        $competences_langues = Parametrage::where('table', 'LIKE', 'competence_linguistique')->get();
        $type_contrats = Parametrage::where('table', 'LIKE', 'type_contrat')->get();
        $duree_contrats = Parametrage::where('table', 'LIKE', 'duree_contrat')->get();
        $statut_socio_economiques = Parametrage::where('table', 'LIKE', 'statut_socio_economique')->get();
        $conditions_vie_specifiques = Parametrage::where('table', 'LIKE', 'conditions_vie_specifiques')->get();
        $religions = Parametrage::where('table', 'LIKE', 'religion')->get();
        $orientation_sexuelles = Parametrage::where('table', 'LIKE', 'orientation_sexuelle')->get();
        //categories
        $domaines_etudes_categories = ListCategorie::with('list_with_categories')
            ->where('table', 'LIKE', 'domaines_etudes')
            ->get();
        $secteur_activites_categories = ListCategorie::with('list_with_categories')
            ->where('table', 'LIKE', 'secteur_activites')
            ->get();

        return view('inscription.form-etudiant', compact([
            'mada_regions',
            'france_regions',
            'genres',
            //'domaine_etudes',
            'niveau_etudes',
            'competences_techniques',
            'competences_en_recherche_et_analyse',
            'competences_en_communication',
            'competences_interpersonnelles',
            'competences_resolution_problemes',
            'competences_adaptabilite',
            'competences_gestion_stress',
            'competences_leadership',
            'competences_ethique_responsabilite',
            'competences_gestion_financiere',
            'competences_langues',
            'type_contrats',
            'duree_contrats',
            'ethnies',
            'statut_socio_economiques',
            'conditions_vie_specifiques',
            'religions',
            'orientation_sexuelles',
            'domaines_etudes_categories',
            'secteur_activites_categories',
        ]));
    }

    public function register_etudiant_post(Request $request): RedirectResponse
    {
        $registerData = Session::get('register_data');

        if (!$registerData) {
            return redirect()->route('inscription');
        }

        $validateData = $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'numero_telephone' => 'required|string',
            'date_naissance' => 'required|string',
            'genre' => 'required|string',
            'adresse_postale' => 'required|string',
            'pays' => 'required|string',
            'region' => 'required|string',
            'ville' => 'required|string',
            'code_postal' => 'required|string',
            'nom_ecole_universite' => 'required|string',
            'domaine_etudes' => 'required|string',
            'niveau_etudes' => 'required|string',
            'annee_obtention_diplome' => 'required|integer',

            // competences
            'competences_techniques' => 'nullable|array',
            'competences_en_recherche_et_analyse' => 'nullable|array',
            'competences_en_communication' => 'nullable|array',
            'competences_interpersonnelles' => 'nullable|array',
            'competences_resolution_problemes' => 'nullable|array',
            'competences_adaptabilite' => 'nullable|array',
            'competences_gestion_stress' => 'nullable|array',
            'competences_leadership' => 'nullable|array',
            'competences_ethique_responsabilite' => 'nullable|array',
            'competences_gestion_financiere' => 'nullable|array',
            'competences_langues' => 'nullable|array',

            // Autres
            'portfolio' => 'nullable|string',
            'centres_interet' => 'required|string',
            'document_diplome' => 'required',
            'document_recommandation' => 'required',
            'secteur_activite_preferer' => 'nullable|array',
            'type_emploi_recherche' => 'nullable|array',
            'localisation_geographique_preferee' => 'required|string',
            //'salaire_souhaite' => 'required',
            'duree_disponibilite' => 'required',
            'semestre_cours' => 'required',
            'vacances_ete_debut' => 'required',
            'vacances_ete_fin' => 'required',
            'dates_disponibles_vacances_ete_debut' => 'required',
            'dates_disponibles_vacances_ete_fin' => 'required',
            'accessibilite' => 'required',
            'details_accessibilite' => 'nullable|string',
            'origine_ethnique' => 'required|string',
            'statut_socio_economique' => 'required|string',
            'conditions_vie_specifiques' => 'required|string',
            'religion_belief' => 'required|string',
            'orientation_sexuelle' => 'required|string',
        ]);

        try {

            DB::transaction(function () use ($registerData, $request, $validateData) {

                //upload des fichiers
                if ($request->hasFile('document_diplome')) {
                    $validateData['document_diplome'] = Storage::disk('public')->put('document_diplome', $request->file('document_diplome'));
                } else {
                    return back()->withErrors([
                        'document_diplome' => 'Erreur lors de l\'importation du document diplôme'
                    ]);
                }

                if ($request->hasFile('document_recommandation')) {
                    $validateData['document_recommandation'] = Storage::disk('public')->put('document_recommandation', $request->file('document_recommandation'));
                } else {
                    return back()->withErrors([
                        'document_recommandation' => 'Erreur lors de l\'importation du document recommendation'
                    ]);
                }

                // Si l'université n'est pas dans la base de données
                // TODO à verifier
                $is_univ_partenaire = Universite::where('nom_etablissement', 'LIKE', "%" . $validateData['nom_ecole_universite'] . "%")->count();

                $status_compte = false;
                if ($is_univ_partenaire === 0) {
                    $status_compte = true;
                }

                $etudiant = Etudiant::create($validateData);

                // Expericens academiques
                $type_experiences_academmiques = ['stage_academique', 'projet_academique', 'these_memoire', 'realisations', 'cours_speciaux', 'autres_experiences'];

                foreach ($type_experiences_academmiques as $type_experiences_academmique) {
                    if ($request->has($type_experiences_academmique . '_titre')
                        && $request->has($type_experiences_academmique . '_annee')
                        && $request->has($type_experiences_academmique . '_duree')
                    ) {
                        $titres = $request->get($type_experiences_academmique . '_titre');
                        $annees = $request->get($type_experiences_academmique . '_annee');
                        $durees = $request->get($type_experiences_academmique . '_duree');
                        $descriptions = $request->get($type_experiences_academmique . '_description');

                        //si les tableaux ont même taille
                        if (count($titres) == count($annees) && count($titres) == count($durees)) {
                            for ($i = 0; $i < count($titres); $i++) {
                                $data = [];
                                $data['titre'] = $titres[$i];
                                $data['duree'] = $durees[$i];
                                $data['annee'] = $annees[$i];
                                if (isset($descriptions[$i])) {
                                    $data['description'] = $descriptions[$i];
                                }
                                $data['etudiant_id'] = $etudiant->id;
                                $data['type'] = $type_experiences_academmique;
                                ExperienceAcademique::create($data);
                            }
                        }
                    }

                }

                // Experiences pro
                $exp_pro = "experiences_professionnelles";
                if ($request->has($exp_pro . '_titre_poste')
                    && $request->has($exp_pro . '_nom_entreprise')
                    && $request->has($exp_pro . '_date_debut')
                    && $request->has($exp_pro . '_lieu')
                    && $request->has($exp_pro . '_secteur')
                    && $request->has($exp_pro . '_type_contrat')
                ) {
                    $titre_postes = $request->get($exp_pro . '_titre_poste');
                    $nom_entreprises = $request->get($exp_pro . '_nom_entreprise');
                    $date_debuts = $request->get($exp_pro . '_date_debut');
                    $date_fins = $request->get($exp_pro . '_date_fin');
                    $lieus = $request->get($exp_pro . '_lieu');
                    $secteurs = $request->get($exp_pro . '_secteur');
                    $type_contrats = $request->get($exp_pro . '_type_contrat');
                    $salaires = $request->get($exp_pro . '_salaire');
                    $descriptions = $request->get($exp_pro . '_description');

                    //si les tableaux ont même taille
                    if (count($titre_postes) == count($nom_entreprises)
                        && count($titre_postes) == count($date_debuts)
                        && count($titre_postes) == count($lieus)
                        && count($titre_postes) == count($secteurs)
                        && count($titre_postes) == count($type_contrats)
                    ) {
                        for ($i = 0; $i < count($titre_postes); $i++) {
                            $data = [];
                            $data['titre_poste'] = $titre_postes[$i];
                            $data['nom_entreprise'] = $nom_entreprises[$i];
                            $data['date_debut'] = $date_debuts[$i];
                            if (isset($date_fins[$i])) {
                                $data['date_fin'] = $date_fins[$i];
                            }
                            $data['lieu'] = $lieus[$i];
                            $data['secteur'] = $secteurs[$i];
                            $data['type_contrat'] = $type_contrats[$i];
                            if (isset($salaires[$i])) {
                                $data['salaire'] = $salaires[$i];
                            }
                            if (isset($descriptions[$i])) {
                                $data['description'] = $descriptions[$i];
                            }

                            $data['etudiant_id'] = $etudiant->id;

                            ExperienceProfessionnelle::create($data);
                        }
                    }
                }

                // création du compte utilisateur
                $user = User::create([
                    'email' => $registerData['email'],
                    'password' => bcrypt($registerData['password']),
                    'userable_id' => $etudiant->id,
                    'userable_type' => get_class($etudiant),
                    'is_accepted_by_admin' => $status_compte
                ]);

                $user->assignRole('etudiant');

                //envoyer email de verification
                $user->sendEmailVerificationNotification();

                Auth::login($user);
            });

        } catch (Exception $exception) {
            Storage::delete($validateData['document_diplome']);
            Storage::delete($validateData['document_recommandation']);
            throw new Exception($exception->getMessage());
        }


        // Nettoyer les données de la session
        Session::forget('register_data');

        return redirect()->route('attente_verification_email');
    }

    //inscription entreprise
    public function register_entreprise_get(): View|RedirectResponse
    {
        if (!Session::get('register_data')) {
            return redirect()->route('inscription');
        }

        if (Auth::check()) {
            $user = Auth::user();
            return redirect()->route(Redirection::redirect_if_authenticated($user));
        }

        $mada_regions = File::json(base_path("/resources/data/region_mada.json"));
        $secteur_activites_categories = ListCategorie::with('list_with_categories')
            ->where('table', 'LIKE', 'secteur_activites')
            ->get();
        $opportunites_proposes = Parametrage::where('table', 'LIKE', 'opportunites_proposes')->get();
        $domaines_etudes_categories = ListCategorie::with('list_with_categories')
            ->where('table', 'LIKE', 'domaines_etudes')
            ->get();
        $engagement_inclusivite_diversites = Parametrage::where('table', 'LIKE', 'engagement_inclusivite_diversite')->get();
        $soutien_formations = Parametrage::where('table', 'LIKE', 'soutien_formation')->get();


        $offres = Subscription::with('permissions')->get();


        return view('inscription.form-entreprise', compact(
            'mada_regions',
            'secteur_activites_categories',
            'opportunites_proposes',
            'domaines_etudes_categories',
            'engagement_inclusivite_diversites',
            'soutien_formations',
            'offres',
        ));
    }

    public function register_entreprise_post(Request $request): RedirectResponse
    {
        $registerData = Session::get('register_data');

        if (!$registerData) {
            return redirect()->route('inscription');
        }

        $validatedData = $request->validate([
            'nom_entreprise' => 'required|string',
            'secteur_activite' => 'required|string',
            'adresse' => 'required|string',
            'complement_adresse' => 'nullable|string',
            'code_postal' => 'required|string',
            'ville' => 'required|string',
            'region' => 'required|string',
            'pays' => 'required|string',
            'site_web' => 'nullable|string|nullable',
            'date_creation' => 'required|string',
            'nom_contact' => 'required|string',
            'fonction_contact' => 'required|string',
            'email_contact' => 'required|string',
            'telephone_contact' => 'required|string',
            'opportunities' => 'nullable|array',
            'domaines_activites' => 'nullable|array',
            'inclusion_diversity' => 'nullable|array',
            'training_support' => 'nullable|array',
            'selected_offer' => 'required|string',
        ]);

        try {
            // enregistrement via un transaction
            DB::transaction(function () use ($registerData, $validatedData) {
                $entreprise = Entreprise::create($validatedData);

                $user = User::create([
                    'email' => $registerData['email'],
                    'password' => bcrypt($registerData['password']),
                    'userable_id' => $entreprise->id,
                    'userable_type' => get_class($entreprise),
                ]);

                $user->assignRole('entreprise');

                //envoyer email de verification
                $user->sendEmailVerificationNotification();

                Auth::login($user);

            });
        } catch (\Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        // Nettoyer les données de la session
        Session::forget('register_data');

        return redirect()->route('attente_verification_email');
    }

    //inscription service carriere
    public function register_service_carriere_get(): View|RedirectResponse
    {
        if (!Session::get('register_data')) {
            return redirect()->route('inscription');
        }

        if (Auth::check()) {
            $user = Auth::user();
            return redirect()->route(Redirection::redirect_if_authenticated($user));
        }

        $nombre_etudiants = Parametrage::where('table', 'LIKE', 'nombre_etudiant')->get();
        $niveaux_etudes_proposes = Parametrage::where('table', 'LIKE', 'niveaux_etudes_proposes')->get();

        $domaines_etudes_categories = ListCategorie::with('list_with_categories')
            ->where('table', 'LIKE', 'domaines_etudes')
            ->get();

        return view('inscription.form-service-carriere', compact([
            'nombre_etudiants',
            'niveaux_etudes_proposes',
            'domaines_etudes_categories'
        ]));
    }

    public function register_service_carriere_post(Request $request): RedirectResponse
    {
        $registerData = Session::get('register_data');

        if (!$registerData) {
            return redirect()->route('inscription');
        }

        $validatedData = $request->validate([
            'nom_etablissement' => 'required|string',
            'adresse_etablissement' => 'required|string',
            'site_web' => 'nullable|string',
            'nom_contact' => 'required|string',
            'fonction_contact' => 'required|string',
            'adresse_email_contact' => 'required|string',
            'numero_telephone_contact' => 'required|string',
            'nombre_etudiants' => 'required|string',
            'domaines_etudes_proposes' => 'required|array',
            'niveaux_etudes_proposes' => 'required|array',
        ]);

        try {
            // enregistrement via un transaction
            DB::transaction(function () use ($registerData, $validatedData) {
                $universite = Universite::create($validatedData);

                $user = User::create([
                    'email' => $registerData['email'],
                    'password' => bcrypt($registerData['password']),
                    'userable_id' => $universite->id,
                    'userable_type' => get_class($universite),
                ]);

                $user->assignRole('service-carriere');

                //envoyer email de verification
                $user->sendEmailVerificationNotification();

                Auth::login($user);
            });
        } catch (\Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        // Nettoyer les données de la session
        Session::forget('register_data');

        return redirect()->route('attente_verification_email');
    }
}
