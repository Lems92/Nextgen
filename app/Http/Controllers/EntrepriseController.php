<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Offre;
use App\Models\Parametrage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Mail;
use App\Mail\CandidatApproved;
use App\Mail\CandidatRejected;
use App\Mail\CandidatRecruited; // Assurez-vous de créer ce mail

class EntrepriseController extends Controller
{
    public function dashboard(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $offres = Offre::where('entreprise_id', '=', $user->userable->id)->limit(3)->get();
        return view('entreprise.tableau-de-bord', compact('offres'));
    }

    public function offres(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $entreprise = $user->userable;
        $entreprise->load('offres');
        $entreprise->offres->load('etudiants');
        return view('entreprise.offres', [
            'offres' => $entreprise->offres
        ]);
    }

    public function publier_offre(): View
    {
        $parametres_tables = [
            'type_contrat', 'duree_contrat', 'lieu_poste',
            'competence_technique', 'competence_transversale', 'competence_linguistique'
        ];
        $parametres = Parametrage::whereIn('table', $parametres_tables)->get()->groupBy('table');

        $type_contrats = $parametres->get('type_contrat');
        $duree_contrats = $parametres->get('duree_contrat');
        $lieu_postes = $parametres->get('lieu_poste');
        $competences_techniques = $parametres->get('competence_technique');
        $competences_transversales = $parametres->get('competence_transversale');
        $langues = $parametres->get('competence_linguistique');

        return view('entreprise.publier-une-offre', compact([
            'type_contrats', 'duree_contrats', 'lieu_postes',
            'competences_techniques', 'competences_transversales', 'langues'
        ]));
    }

    public function validate_publier_offre(Request $request): RedirectResponse
    {
        // Validation des données
        $entrepriseId = $request->user()->userable->id;

        $validatedData = $request->validate([
            'titre_poste' => 'required|string|max:255',
            'type_contrat' => 'required|string',
            'duree_contrat' => 'required|string',
            'lieu_poste' => 'required|string',
            'date_debut' => 'required|date',
            'description_poste' => 'required|string',
            'competences_techniques' => 'required|array',
            'competences_transversales' => 'required|array',
            'langues_requises' => 'required|array',
            'avantages' => 'nullable|string',
            'date_limite_candidature' => 'required|date',
        ]);

        $validatedData['entreprise_id'] = $entrepriseId;

        Offre::create($validatedData);

        return redirect()->route('entreprise.offres')
            ->with('success', 'Offre publiée avec succès');
    }

    public function show_offre(Request $request, Offre $offre) : View | RedirectResponse
    {
        $offre->load('etudiants');
        return view('entreprise.show-offres', compact('offre'));
    }

    public function edit_offre(Request $request, Offre $offre): View
    {
        $parametres_tables = [
            'type_contrat', 'duree_contrat', 'lieu_poste',
            'competence_technique', 'competence_transversale', 'competence_linguistique'
        ];
        $parametres = Parametrage::whereIn('table', $parametres_tables)->get()->groupBy('table');

        $type_contrats = $parametres->get('type_contrat');
        $duree_contrats = $parametres->get('duree_contrat');
        $lieu_postes = $parametres->get('lieu_poste');
        $competences_techniques = $parametres->get('competence_technique');
        $competences_transversales = $parametres->get('competence_transversale');
        $langues = $parametres->get('competence_linguistique');

        return view('entreprise.publier-une-offre', compact([
            'type_contrats', 'duree_contrats', 'lieu_postes',
            'competences_techniques', 'competences_transversales', 'langues', 'offre'
        ]));
    }

    public function update_offre(Request $request, Offre $offre): RedirectResponse
    {
        $validatedData = $request->validate([
            'titre_poste' => 'required|string|max:255',
            'type_contrat' => 'required|string',
            'duree_contrat' => 'required|string',
            'lieu_poste' => 'required|string',
            'date_debut' => 'required|date',
            'description_poste' => 'required|string',
            'competences_techniques' => 'required|array',
            'competences_transversales' => 'required|array',
            'langues_requises' => 'required|array',
            'avantages' => 'nullable|string',
            'date_limite_candidature' => 'required|date',
        ]);

        $offre->update($validatedData);

        return redirect()->route('entreprise.offres')
            ->with('success', 'Offre modifiée avec succès');
    }

    public function delete_offre(Request $request, Offre $offre): RedirectResponse
    {
        $offre->delete();
        return redirect()->route('entreprise.offres')
            ->with('success', 'Offre supprimée avec succès');
    }

    public function gerer_candidat(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $entreprise = $user->userable;
        $entreprise->load('offres');
        $candidats = collect();

        foreach ($entreprise->offres as $offre) {
            foreach ($offre->etudiants as $etudiant) {
                $candidats->push([
                    'offre' => $offre,
                    'etudiant' => $etudiant,
                    'status' => $etudiant->pivot->status, // Charger le champ 'status' depuis la table pivot
                ]);
            }
        }

        return view('entreprise.gerer-candidat', compact('candidats'));
    }

    public function approveCandidat(Request $request, $etudiantId): RedirectResponse
    {
        $etudiant = \App\Models\Etudiant::findOrFail($etudiantId);
        $user = $etudiant->user;

        if (!$user || empty($user->email)) {
            return redirect()->route('entreprise.gerer-candidat')
                ->with('error', 'L\'adresse email associée à cet étudiant est manquante.');
        }

        // Mettre à jour le statut dans la table pivot
        $offreId = $request->input('offre_id'); // Assurez-vous que l'ID de l'offre est envoyé dans la requête
        $etudiant->offres()->updateExistingPivot($offreId, ['status' => 'accepted']);

        // Récupérer le nom de l'entreprise
        $entrepriseNom = $request->user()->userable->nom;

        // Envoyer un email à l'étudiant
        Mail::to($user->email)->send(new CandidatApproved($etudiant, $entrepriseNom));

        return redirect()->route('entreprise.gerer-candidat')
            ->with('success', 'Le candidat a été approuvé et un email a été envoyé.');
    }

    public function rejectCandidat(Request $request, $etudiantId): RedirectResponse
    {
        $etudiant = \App\Models\Etudiant::findOrFail($etudiantId);
        $user = $etudiant->user;

        if (!$user || empty($user->email)) {
            return redirect()->route('entreprise.gerer-candidat')
                ->with('error', 'L\'adresse email associée à cet étudiant est manquante.');
        }

        // Mettre à jour le statut dans la table pivot
        $offreId = $request->input('offre_id'); // Assurez-vous que l'ID de l'offre est envoyé dans la requête
        $etudiant->offres()->updateExistingPivot($offreId, ['status' => 'rejected']);

        // Envoyer un email à l'étudiant
        Mail::to($user->email)->send(new CandidatRejected($etudiant));

        return redirect()->route('entreprise.gerer-candidat')
            ->with('success', 'Le candidat a été rejeté et un email a été envoyé.');
    }

    public function recruitCandidat(Request $request, $etudiantId): RedirectResponse
    {
        $etudiant = \App\Models\Etudiant::findOrFail($etudiantId);
        $user = $etudiant->user;

        if (!$user || empty($user->email)) {
            return redirect()->route('entreprise.gerer-candidat')
                ->with('error', 'L\'adresse email associée à cet étudiant est manquante.');
        }

        // Mettre à jour le statut dans la table pivot
        $offreId = $request->input('offre_id');
        $etudiant->offres()->updateExistingPivot($offreId, ['status' => 'recruited']);

        // Envoyer un email à l'étudiant
        Mail::to($user->email)->send(new CandidatRecruited($etudiant));

        return redirect()->route('entreprise.gerer-candidat')
            ->with('success', 'Le candidat a été recruté et un email a été envoyé.');
    }

    public function setPending(Request $request, $etudiantId): RedirectResponse
    {
        $etudiant = \App\Models\Etudiant::findOrFail($etudiantId);
        $user = $etudiant->user;

        if (!$user) {
            return redirect()->route('entreprise.gerer-candidat')
                ->with('error', 'L\'utilisateur associé à cet étudiant est introuvable.');
        }

        // Mettre à jour le statut dans la table pivot
        $offreId = $request->input('offre_id'); // Assurez-vous que l'ID de l'offre est envoyé dans la requête
        $etudiant->offres()->updateExistingPivot($offreId, ['status' => 'pending']);

        return redirect()->route('entreprise.gerer-candidat')
            ->with('success', 'Le statut du candidat a été mis en attente avec succès.');
    }

    public function showApprovePage($id, Request $request)
    {
        $etudiant = Etudiant::with('user')->findOrFail($id); // Charge la relation 'user'
        $offre = Offre::findOrFail($request->input('offre_id')); // Vérifie que l'offre existe

        return view('entreprise.approve-email', [
            'etudiant' => $etudiant,
            'offre' => $offre,
        ]);
    }

    public function approveWithEmail(Request $request)
    {
        $etudiantId = $request->input('etudiant_id');
        $offreId = $request->input('offre_id');
        $validated = $request->validate([
            'etudiant_id' => 'required|integer',
            'offre_id' => 'required|integer',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $etudiant = Etudiant::findOrFail($validated['etudiant_id']);
        $offre = Offre::findOrFail($validated['offre_id']);
        $etudiant->offres()->updateExistingPivot($offreId, ['status' => 'accepted']);

        // Envoyer l'email
        Mail::send('mails.approver', [
            'prenom' => $etudiant->prenom,
            'entreprise_nom' => $offre->entreprise->nom,
            'body' => $validated['body'], // Passer le contenu personnalisé
        ], function ($message) use ($etudiant, $validated) {
            $message->to($etudiant->user->email)
                    ->subject($validated['subject']);
        });

        return redirect()->route('entreprise.gerer-candidat')->with('success', 'Email envoyé avec succès.');
    }
    public function page_entreprise(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $entreprise = Entreprise::with(['user', 'offres'])->findOrFail($user->userable->id);
        return view('entreprise.page-entreprise', compact('entreprise'));
    }

    public function public_show_entreprise(Request $request, Entreprise $entreprise): View | RedirectResponse
    {
        $entreprise->load(['user', 'offres']);

        if($entreprise->user->hasPermissionTo('page_presentation_entreprise')) {
            return view('entreprise.page-entreprise', compact('entreprise'));
        }

        return redirect()->back()->with('error', 'L\'entreprise que vous essayez de voir ne dispose pas les permissions necessaires pour ce fonctionnalité!');
    }

    public function shortlist_vip(): View
    {
        return view('entreprise.shortlist-vip');
    }

    public function mon_abonnement(): View
    {
        return view('entreprise.mon-abonnement');
    }

}
