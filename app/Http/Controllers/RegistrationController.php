<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Etudiant;
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

    public function register_get(): View | RedirectResponse
    {
        if(Auth::check()) {
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
        if(Auth::check()) {
            $user = Auth::user();
            return redirect()->route(Redirection::redirect_if_authenticated($user));
        }

        $mada_regions = File::json(base_path("/resources/data/region_mada.json"));
        $france_regions = File::json(base_path("/resources/data/region_france.json"));

        return view('inscription.form-etudiant', [
            'mada_regions' => $mada_regions,
            'france_regions' => $france_regions
        ]);
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
            'portfolio' => 'nullable|string',
            'centres_interet' => 'required|string',
            'document_diplome' => 'required',
            'document_recommandation' => 'required',
            'secteur_activite_preferer' => 'required|array',
            'type_emploi_recherche' => 'required|array',
            'localisation_geographique_preferee' => 'required|string',
            'salaire_souhaite' => 'required',
            'duree_disponibilite' => 'required',
            'semestre_cours' => 'required',
            'vacances_ete_debut' => 'required',
            'vacances_ete_fin' => 'required',
            'dates_disponibles_vacances_ete_debut' => 'required',
            'dates_disponibles_vacances_ete_fin' => 'required',
            'accessibilite' => 'required',
            'details_accessibilite' => 'nullable|string',
            'origine_ethnique' => 'required',
            'statut_socio_economique' => 'required',
            'conditions_vie_specifiques' => 'required',
            'religion_belief' => 'required',
            'orientation_sexuelle' => 'required',
        ]);

        //dd($validateData);

        //upload des fichiers
        if($request->hasFile('document_diplome')) {
            $validateData['document_diplome'] = Storage::disk('public')->put('document_diplome', $request->file('document_diplome'));
        } else {
            return back()->withErrors([
                'document_diplome' => 'Erreur lors de l\'importation du document diplôme'
            ]);
        }

        if($request->hasFile('document_recommandation')) {
            $validateData['document_recommandation'] = Storage::disk('public')->put('document_recommandation', $request->file('document_recommandation'));
        } else {
            return back()->withErrors([
                'document_recommandation' => 'Erreur lors de l\'importation du document recommendation'
            ]);
        }

        // Si l'université n'est pas dans la base de données
        // TODO à verifier
        $is_univ_partenaire = Universite::where('nom_etablissement', 'LIKE', "%%")->count();

        if($is_univ_partenaire === 0) {
            $validateData['is_accepted_by_admin'] = true;
        }

        try {
            // enregistrement via un transaction
            DB::transaction(function () use ($registerData, $validateData) {
                $etudiant = Etudiant::create($validateData);

                $user = User::create([
                    'email' => $registerData['email'],
                    'password' => bcrypt($registerData['password']),
                    'userable_id' => $etudiant->id,
                    'userable_type' => get_class($etudiant),
                ]);

                $user->assignRole('etudiant');

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

    //inscription entreprise
    public function register_entreprise_get(): View|RedirectResponse
    {
        if (!Session::get('register_data')) {
            return redirect()->route('inscription');
        }

        if(Auth::check()) {
            $user = Auth::user();
            return redirect()->route(Redirection::redirect_if_authenticated($user));
        }

        $mada_regions = File::json(base_path("/resources/data/region_mada.json"));

        return view('inscription.form-entreprise', [
            'mada_regions' => $mada_regions
        ]);
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
            'complement_adresse' => 'required|string',
            'code_postal' => 'required|string',
            'ville' => 'required|string',
            'region' => 'required|string',
            'pays' => 'required|string',
            'site_web' => 'required|string|nullable',
            'date_creation' => 'required|string',
            'nom_contact' => 'required|string',
            'fonction_contact' => 'required|string',
            'email_contact' => 'required|string',
            'telephone_contact' => 'required|string',
            'opportunities' => 'required|array',
            'domaines_activites' => 'required|array',
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

        if(Auth::check()) {
            $user = Auth::user();
            return redirect()->route(Redirection::redirect_if_authenticated($user));
        }

        return view('inscription.form-service-carriere');
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
