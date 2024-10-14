<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

    public function gerer_etudiants(): View
    {
        return view('universite.gestion-etudiants');
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
