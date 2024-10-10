<?php

namespace App\Http\Controllers;

use App\Mail\EntrepriseRegistrationConfirmationMail;
use App\Mail\UniversiteRegistrationConfirmationMail;
use App\Models\Entreprise;
use App\Models\Universite;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard() : View
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
        $user = User::findOrFail((int) $id);
        $user->load('userable');
        $user->update([
            'is_accepted_by_admin' => true,
        ]);
        // send email notification
        if($type=='entreprise') {
            Mail::to($user['email'])->send(new EntrepriseRegistrationConfirmationMail([
                'prenom' => $user->userable->nom_contact,
                'nom_entreprise' => $user->userable->nom_entreprise
            ]));
        } else if($type=='universite') {
            Mail::to($user['email'])->send(new UniversiteRegistrationConfirmationMail([
                'prenom' => $user->userable->nom_contact,
                'nom_etablissement' => $user->userable->nom_etablissement
            ]));
        }

        return redirect()->intended($request->get('route'));
    }

    public function parametrages(): View
    {
        return view('admin.parametrages');
    }
}
