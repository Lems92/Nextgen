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

        $genres = [
            (object) ['sigle' => 'M', 'libelle' => 'Masculin'],
            (object) ['sigle' => 'F', 'libelle' => 'Féminin']
        ];
        $mada_regions = ['Antananarivo', 'Fianarantsoa', 'Toamasina', 'Mahajanga', 'Toliara', 'Antsiranana'];
        $france_regions = ['Île-de-France', 'Provence-Alpes-Côte d\'Azur', 'Auvergne-Rhône-Alpes'];

        return view('inscription.form-etudiant', compact('genres', 'mada_regions', 'france_regions'));
    }

    public function register_etudiant_post(Request $request): RedirectResponse
    {
        $registerData = Session::get('register_data');

        if (!$registerData) {
            return redirect()->route('inscription');
        }

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

        try {
            $etudiant = Etudiant::create(array_merge($validatedData, [
                'nom_ecole_universite' => '',
                'domaine_etudes' => '',
                'niveau_etudes' => '',
                'annee_obtention_diplome' => '',
                'competences_techniques' => '',
                'competences_en_recherche_et_analyse' => '',
                'competences_en_communication' => '',
                'competences_interpersonnelles' => '',
                'competences_resolution_problemes' => '',
                'competences_adaptabilite' => '',
                'competences_gestion_stress' => '',
                'competences_leadership' => '',
                'competences_ethique_responsabilite' => '',
                'competences_gestion_financiere' => '',
                'competences_langues' => '',
                'experience_professionnelle' => '',
                'portfolio' => '',
                'centres_interet' => '',
                'document_diplome' => '',
                'document_recommandation' => '',
                'secteur_activite_preferer' => json_encode([]),
                'type_emploi_recherche' => json_encode([]),
                'localisation_geographique_preferee' => '',
                'duree_disponibilite' => '',
                'semestre_cours' => '',
                'vacances_ete_debut' => null,
                'vacances_ete_fin' => null,
                'dates_disponibles_vacances_ete_debut' => null,
                'dates_disponibles_vacances_ete_fin' => null,
                'accessibilite' => false, // Valeur par défaut
                'details_accessibilite' => '',
                'origine_ethnique' => '',
                'statut_socio_economique' => '',
                'conditions_vie_specifiques' => '',
                'religion_belief' => '',
                'orientation_sexuelle' => '',
                'profile_picture' => '',
                'slug' => strtolower($validatedData['prenom']),
                'description' => '',
            ]));

            // Créer l'utilisateur associé à l'étudiant
            $user = User::create([
                'email' => $registerData['email'],
                'password' => bcrypt($registerData['password']),
                'userable_id' => $etudiant->id,
                'userable_type' => get_class($etudiant),
                'is_accepted_by_admin' => true,
            ]);

            $user->assignRole('etudiant');

            // Envoyer un email de vérification
            $user->sendEmailVerificationNotification();

            Auth::login($user);

        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
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

        $list_avec_categories_tables = ['domaines_etudes', 'secteur_activites'];
        $list_categories = ListCategorie::whereIn('table', $list_avec_categories_tables)->get()->groupBy('table');

        $domaines_etudes_categories = $list_categories->get('domaines_etudes');
        $secteur_activites_categories = $list_categories->get('secteur_activites');


        $parametres_tables = [
            'opportunites_proposes', 'engagement_inclusivite_diversite', 'soutien_formation'
        ];
        $parametres = Parametrage::whereIn('table', $parametres_tables)->get()->groupBy('table');

        $opportunites_proposes = $parametres->get('opportunites_proposes');
        $engagement_inclusivite_diversites = $parametres->get('engagement_inclusivite_diversite');
        $soutien_formations = $parametres->get('soutien_formation');

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

        $parametres_tables = [
            'nombre_etudiant', 'niveaux_etudes_proposes'
        ];
        $parametres = Parametrage::whereIn('table', $parametres_tables)->get()->groupBy('table');


        $nombre_etudiants = $parametres->get('nombre_etudiant');
        $niveaux_etudes_proposes = $parametres->get('niveaux_etudes_proposes');

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
