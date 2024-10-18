<?php

namespace App\Http\Controllers;

use App\Models\DemandeAffiliationUniversite;
use App\Models\Etudiant;
use App\Models\EtudiantUniversite;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Mockery\Exception;

class UniversiteController extends Controller
{

    public function dashboard(): View
    {
        return view('universite.tableau-de-bord');
    }

    public function gerer_event(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $user->userable->load('events');
        return view('universite.gerer-event', [
            'events' => $user->userable->events
        ]);
    }

    public function gerer_etudiants(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $universite = $user->userable;
        $etudiants_univ = EtudiantUniversite::with(['etudiant'=> function ($query) {
            $query->select('id', 'nom', 'prenom', 'numero_telephone', 'niveau_etudes', 'annee_obtention_diplome', 'slug');
        }])->where('universite_id', '=', $universite->id)->get();

        $demande_count = DemandeAffiliationUniversite::where('universite_id', '=', $universite->id)->count();
        return view('universite.gestion-etudiants', compact('etudiants_univ', 'demande_count'));
    }

    public function list_demande_affiliation_etudiant(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $universite = $user->userable;
        $demandes = DemandeAffiliationUniversite::with('etudiant')->where('universite_id', '=', $universite->id)->get();
        return view('universite.liste-demande-affiliation-etu', compact('demandes'));
    }

    public function show_demande_affiliation(Request $request, DemandeAffiliationUniversite $demande): View
    {
        $demande->load('etudiant');

        return view('universite.show-demande-affiliation', compact('demande'));
    }

    public function accept_demande_affiliation(Request $request, DemandeAffiliationUniversite $demande): RedirectResponse
    {
        try {
            DB::transaction(function () use ($demande) {
                EtudiantUniversite::create([
                    'universite_id' => $demande->universite_id,
                    'etudiant_id' => $demande->etudiant_id,
                ]);
                $demande->delete();
            });
        } catch (\Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        //send notification

        return redirect()->intended(route('universite.list_demande_affiliation_etudiant'))->with('success', 'La demande d\'affiliation a été accepté avec succès!');
    }

    public function refuser_demande_affiliation(Request $request, DemandeAffiliationUniversite $demande): RedirectResponse
    {
        $demande->delete();
        //send notification

        return redirect()->intended(route('universite.list_demande_affiliation_etudiant'))->with('success', 'La demande d\'affiliation a été refusé!');
    }

    public function publier_event(): View
    {
        return view('universite.publier-evenements');
    }

    public function publier_event_store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'event_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'event_description' => 'required|string',
        ]);

        $user = $request->user();
        $user->load('userable');

        $validatedData['universite_id'] = $user->userable->id;

        Event::create($validatedData);

        return redirect()->intended(route('universite.gerer_event'))->with('success', 'Événement ajouté avec succès.');

    }

    public function delete_event(Request $request): RedirectResponse
    {
        $request->validate(['event_id' => 'required|integer']);
        $event_id = $request->get('event_id');
        $event = Event::findOrFail((int) $event_id);
        $event->delete();
        return redirect()->intended(route('universite.gerer_event'))->with('success', 'Événement supprimé avec succès.');
    }

    public function edit_event(Request $request, Event $event): View
    {
        return view('universite.publier-evenements', compact(['event']));
    }

    public function edit_event_validate(Request $request, Event $event): RedirectResponse
    {
        $validatedData = $request->validate([
            'event_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'event_description' => 'required|string',
        ]);

        $event->update($validatedData);

        return redirect()->intended(route('universite.gerer_event'))->with('success', 'Événement modifié avec succès.');
    }
}
