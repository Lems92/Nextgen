<?php

namespace App\Http\Controllers;

use App\Mail\EntrepriseRegistrationConfirmationMail;
use App\Mail\UniversiteRegistrationConfirmationMail;
use App\Models\Etudiant;
use App\Models\ListWithCategory;
use App\Models\ListCategorie;
use App\Models\Entreprise;
use App\Models\Parametrage;
use App\Models\Subscription;
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
        $entreprises = Entreprise::limit(5)->orderBy('created_at', 'DESC')->get();
        $type_abonnements = Subscription::all();
        return view('admin.admin-dashboard', compact('entreprises', 'type_abonnements'));
    }

    public function list_entreprises(Request $request): View
    {
        $search_data = [];

        $per_page = $request->get('per_page') ?? 5;
        $search_data['per_page'] = $per_page;
        $search_data['keywords'] = $request->get('keywords') ?? '';

        $entreprises = Entreprise::with('user')
            ->when($request->get('keywords'), function ($query) use ($request) {
                $query->where('nom_entreprise', 'like', '%' . $request->get('keywords') . '%')
                    ->orWhere('adresse', 'like', '%' . $request->get('keywords') . '%');
            })
            ->paginate($per_page)
            ->withQueryString();;

        $entreprises->withPath('/admin/entreprises');

        return view('admin.list_entreprises', [
            'entreprises' => $entreprises,
            'search_data' => $search_data,
        ]);
    }

    public function show_entreprise(Request $request, Entreprise $entreprise): View
    {
        $entreprise->load(['user']);
        return view('admin.show_entreprise', [
            'entreprise' => $entreprise,
        ]);
    }

    public function list_universites(Request $request): View
    {
        $search_data = [];

        $per_page = $request->get('per_page') ?? 5;
        $search_data['per_page'] = $per_page;
        $search_data['keywords'] = $request->get('keywords') ?? '';

        $universites = Universite::with('user')
            ->when($request->get('keywords'), function ($query) use ($request) {
                $query->where('nom_etablissement', 'like', '%' . $request->get('keywords') . '%')
                    ->orWhere('adresse_etablissement', 'like', '%' . $request->get('keywords') . '%');
            })
            ->paginate($per_page)
            ->withQueryString();;

        $universites->withPath('/admin/universites');

        return view('admin.list_universites', [
            'universites' => $universites,
            'search_data' => $search_data,
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

    public function list_etudiants(Request $request): View
    {
        $search_data = [];

        $per_page = $request->get('per_page') ?? 5;
        $search_data['per_page'] = $per_page;
        $search_data['keywords'] = $request->get('keywords') ?? '';

        $etudiants = Etudiant::with('user')
            ->when($request->get('keywords'), function ($query) use ($request) {
                $query->where('prenom', 'like', '%' . $request->get('keywords') . '%')
                    ->orWhere('nom', 'like', '%' . $request->get('keywords') . '%')
                    ->orWhere('adresse_postale', 'like', '%' . $request->get('keywords') . '%');
            })
            ->paginate($per_page)
            ->withQueryString();;

        $etudiants->withPath('/admin/etudiants');

        return view('admin.list_etudiants', [
            'etudiants' => $etudiants,
            'search_data' => $search_data,
        ]);
    }

    public function show_etudiant(Request $request, Etudiant $etudiant): View
    {
        $etudiant->load(['user']);
        return view('admin.show_etudiant', [
            'etudiant' => $etudiant,
        ]);
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

    public function list_categories(Request $request): View
    {
        $search_data = [];

        $per_page = $request->get('per_page') ?? 5;
        $search_data['per_page'] = $per_page;
        $search_data['categorie'] = $request->get('categorie') ?? 'tout';
        $search_data['name'] = $request->get('name') ?? '';
        $list_avec_categories = ListWithCategory::with('list_categorie')
        ->when($request->get('categorie') && $request->get('categorie') !== 'tout', function ($query) use ($request) {
            $query->where('list_categorie_id', '=', (int) $request->get('categorie'));
        })
            ->when($request->get('name'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->get('name') . '%');
            })
            ->paginate($per_page)
            ->withQueryString();

        $list_avec_categories->withPath('/admin/list-avec-categories');

        $list_categories = ListCategorie::all();

        return view('admin.list-avec-categories', [
            'list_avec_categories' => $list_avec_categories,
            'list_categories' => $list_categories,
            'search_data' => $search_data,
        ]);
    }

    public function create_list_categories(): View
    {
        $categories = ListCategorie::all();
        return view('admin.create-list-avec-categories', [
            'categories' => $categories,
        ]);
    }

    public function store_list_categories(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'list_categorie_id' => 'required',
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        ListWithCategory::create($validatedData);

        return redirect()->intended(route('admin.list_categories'))->with('success', 'Liste élément ajouté avec succès!');
    }

    public function delete_list_categories(Request $request): RedirectResponse
    {
        $id = $request->get('id');
        $de = ListWithCategory::findOrFail($id);
        $de->delete();
        return redirect()->intended(route('admin.list_categories'))->with('success', 'Liste élément supprimé avec succès!');
    }

    public function update_list_categories(Request $request, ListWithCategory $list_with_categorie): View
    {
        $categories = ListCategorie::all();
        return view('admin.create-list-avec-categories', [
            'list_with_categorie' => $list_with_categorie,
            'categories' => $categories
        ]);
    }

    public function validate_update_list_categories(Request $request, ListWithCategory $list_with_categorie): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $list_with_categorie->update($validatedData);

        return redirect()->intended(route('admin.list_categories'))->with('success', 'Liste élément modifié avec succès!');
    }


    /**
     * Affiche la liste des types d'abonnements disponibles.
     */
    public function type_subscriptions(): View
    {
        $type_subscriptions = Subscription::all();
        return view('admin.type_subscriptions.index', compact('type_subscriptions'));
    }

    public function update_subscription_get(Request $request, Subscription $subscription): View
    {
        return view('admin.type_subscriptions.edit', compact('subscription'));
    }

    /**
     * Met à jour un type d'abonnement existant.
     */
    public function update_subscription(Request $request, Subscription $subscription): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:subscriptions,name,' . $subscription->id,
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $subscription->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);

        return redirect()->intended(route('admin.type_subscriptions'))->with('success', 'Abonnement mis à jour avec succès.');
    }
}
