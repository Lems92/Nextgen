<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;


class RegistrationController extends Controller
{

    public function register_get(): View
    {
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

        return view('inscription.form-etudiant');
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

        //dd($validateData);

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
            });
        } catch (\Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        // Nettoyer les données de la session
        Session::forget('register_data');

        return redirect()->route('connexion');
    }

    //inscription entreprise
    public function register_entreprise_get(): View|RedirectResponse
    {
        if (!Session::get('register_data')) {
            return redirect()->route('inscription');
        }

        return view('inscription.form-entreprise');
    }

    public function register_entreprise_post(Request $request): RedirectResponse
    {
        $registerData = Session::get('register_data');

        if (!$registerData) {
            return redirect()->route('inscription');
        }

        return redirect()->route('home');
    }

    //inscription service carriere
    public function register_service_carriere_get(): View|RedirectResponse
    {
        if (!Session::get('register_data')) {
            return redirect()->route('inscription');
        }

        return view('inscription.form-servicecarriere');
    }

    public function register_service_carriere_post(Request $request): RedirectResponse
    {
        $registerData = Session::get('register_data');

        if (!$registerData) {
            return redirect()->route('inscription');
        }

        return redirect()->route('home');
    }

}
