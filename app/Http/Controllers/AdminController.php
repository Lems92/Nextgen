<?php

namespace App\Http\Controllers;

use App\Mail\EntrepriseRegistrationConfirmationMail;
use App\Mail\UniversiteRegistrationConfirmationMail;
use App\Models\DomaineEtude;
use App\Models\DomaineEtudeCategorie;
use App\Models\Entreprise;
use App\Models\Parametrage;
use App\Models\Table;
use App\Models\Universite;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return view('admin.admin-dashboard');
    }

    public function list_entreprises(): View
    {
        $entreprises = Entreprise::with('user')->get();
        return view('admin.list_entreprises', [
            'entreprises' => $entreprises
        ]);
    }

    public function show_entreprise(Request $request, Entreprise $entreprise): View
    {
        $entreprise->load(['user']);
        return view('admin.show_entreprise', [
            'entreprise' => $entreprise,
        ]);
    }

    public function list_universites(): View
    {
        $universites = Universite::with('user')->get();
        return view('admin.list_universites', [
            'universites' => $universites
        ]);
    }

    public function show_universite(Request $request, Universite $universite): View
    {
        $universite->load(['user']);
        return view('admin.show_universite', [
            'universite' => $universite,
        ]);
    }

    public function activate_account(Request $request): RedirectResponse
    {
        $id = $request->get('id');
        $type = $request->get('type');
        $user = User::findOrFail((int)$id);
        $user->load('userable');
        $user->update([
            'is_accepted_by_admin' => true,
        ]);
        // send email notification
        if ($type == 'entreprise') {
            Mail::to($user['email'])->send(new EntrepriseRegistrationConfirmationMail([
                'prenom' => $user->userable->nom_contact,
                'nom_entreprise' => $user->userable->nom_entreprise
            ]));
        } else if ($type == 'universite') {
            Mail::to($user['email'])->send(new UniversiteRegistrationConfirmationMail([
                'prenom' => $user->userable->nom_contact,
                'nom_etablissement' => $user->userable->nom_etablissement
            ]));
        }

        return redirect()->intended($request->get('route'));
    }

    public function parametrages(Request $request): View
    {
        $search_data = [];

        $per_page = $request->get('per_page') ?? 5;
        $search_data['per_page'] = $per_page;
        $search_data['table'] = $request->get('table') ?? 'tout';
        $search_data['libelle'] = $request->get('libelle') ?? '';

        $parametrages = Parametrage::when($request->get('table') && $request->get('table') !== 'tout', function ($query) use ($request) {
            $query->where('table', 'like', $request->get('table'));
        })
            ->when($request->get('libelle'), function ($query) use ($request) {
                $query->where('libelle', 'like', '%' . $request->get('libelle') . '%');
            })
            ->paginate($per_page)
            ->withQueryString();

        $parametrages->withPath('/admin/parametrages');

        $tables = Table::all();
        return view('admin.parametrages', [
            'parametrages' => $parametrages,
            'tables' => $tables,
            'search_data' => $search_data,
        ]);
    }

    public function create_parametrage(): View
    {
        $tables = Table::all();
        return view('admin.create-parametrage', [
            'tables' => $tables,
        ]);
    }

    public function store_parametrage(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'table' => 'required|string',
            'sigle' => 'required|string',
            'libelle' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Parametrage::create($validatedData);

        return redirect()->intended(route('admin.parametrages'))->with('success', 'Parametre ajouté avec succès!');
    }

    public function delete_parametrage(Request $request)
    {
        $id = $request->get('id');
        $param = Parametrage::findOrFail($id);
        $param->delete();
        return redirect()->intended(route('admin.parametrages'))->with('success', 'Parametre supprimé avec succès!');
    }

    public function update_parametrage(Request $request, $id)
    {
        $parametrage = Parametrage::findOrFail($id);
        $tables = Table::all();
        return view('admin.create-parametrage', [
            'parametrage' => $parametrage,
            'tables' => $tables
        ]);
    }

    public function validate_update_parametrage(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sigle' => 'required|string',
            'libelle' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $parametrage = Parametrage::findOrFail($id);

        $parametrage->update($validatedData);

        return redirect()->intended(route('admin.parametrages'))->with('success', 'Parametre modifié avec succès!');
    }

    public function domaines_etudes(Request $request): View
    {
        $search_data = [];

        $per_page = $request->get('per_page') ?? 5;
        $search_data['per_page'] = $per_page;
        $search_data['categorie'] = $request->get('categorie') ?? 'tout';
        $search_data['name'] = $request->get('name') ?? '';
        $domaines_etudes = DomaineEtude::with('domaine_etude_categorie')
        ->when($request->get('categorie') && $request->get('categorie') !== 'tout', function ($query) use ($request) {
            $query->where('domaine_etude_categorie_id', '=', (int) $request->get('categorie'));
        })
            ->when($request->get('name'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->get('name') . '%');
            })
            ->paginate($per_page)
            ->withQueryString();

        $domaines_etudes->withPath('/admin/domaines_etudes');

        $domaine_etude_categories = DomaineEtudeCategorie::all();

        return view('admin.domaines-etudes', [
            'domaines_etudes' => $domaines_etudes,
            'domaine_etude_categories' => $domaine_etude_categories,
            'search_data' => $search_data,
        ]);
    }

    public function create_domaine_etude(): View
    {
        $categories = DomaineEtudeCategorie::all();
        return view('admin.create-domaine-etude', [
            'categories' => $categories,
        ]);
    }

    public function store_domaine_etude(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'domaine_etude_categorie_id' => 'required',
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        DomaineEtude::create($validatedData);

        return redirect()->intended(route('admin.domaines_etudes'))->with('success', 'Domaine d\'etude ajouté avec succès!');
    }

    public function delete_domaine_etude(Request $request)
    {
        $id = $request->get('id');
        $de = DomaineEtude::findOrFail($id);
        $de->delete();
        return redirect()->intended(route('admin.domaines_etudes'))->with('success', 'Domaine d\'étude supprimé avec succès!');
    }

    public function update_domaine_etude(Request $request, DomaineEtude $domaineEtude)
    {
        $categories = DomaineEtudeCategorie::all();
        return view('admin.create-domaine-etude', [
            'domaine_etude' => $domaineEtude,
            'categories' => $categories
        ]);
    }

    public function validate_update_domaine_etude(Request $request, DomaineEtude $domaineEtude)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $domaineEtude->update($validatedData);

        return redirect()->intended(route('admin.domaines_etudes'))->with('success', 'Domaine d\'étude modifié avec succès!');
    }
}
