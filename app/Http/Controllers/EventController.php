<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function create()
    {
        try {
            // Assurez-vous que l'utilisateur est authentifié avant de récupérer l'université
            if (auth()->check()) {
                $universite_id = auth()->user()->universite_id;
            } else {
                // Gérer le cas où l'utilisateur n'est pas authentifié
                return redirect()->route('connexion')->with('error', 'Vous devez être connecté pour accéder à ce formulaire.');
            }

            return view('events.create', compact('universite_id'));
        } catch (\Exception $e) {
            // Gestion des exceptions pour le cas où quelque chose tourne mal
            return redirect()->route('connexion')->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'universite_id' => 'required|exists:universites,id',
                'event_title' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'start_time' => 'required',
                'end_time' => 'required',
                'event_description' => 'required|string',
            ]);

            // Créer un nouvel événement
            $universite_id = Auth::id(); // Assurez-vous que l'ID utilisateur est correct

            Event::create([
                'universite_id' => $universite_id,
                'event_title' => $request->event_title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'event_description' => $request->event_description,
            ]);

            return redirect()->back()->with('success', 'Événement créé avec succès.');
        } catch (\Exception $e) {
            // Gestion des exceptions lors de la création de l'événement
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'événement : ' . $e->getMessage());
        }
    }

    public function index()
    {
        try {
            // Récupérer tous les événements
            $events = Event::all();
            return view('events.index', compact('events'));
        } catch (\Exception $e) {
            // Gestion des exceptions pour la récupération des événements
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération des événements : ' . $e->getMessage());
        }
    }
}
