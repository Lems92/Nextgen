<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Application;

class OffreController extends Controller
{
    public function create()
    {   
        $entrepriseId = Auth::user()->entreprise_id;

    // Stockez l'ID de l'entreprise dans la session si nécessaire
        session(['entreprise_id' => $entrepriseId]);

        return view('entreprise.publier-une-offre', compact('entrepriseId'));
    }

    public function store(Request $request)
{
    DB::enableQueryLog(); // Activer le journal des requêtes
    // Validation des données
    $entrepriseId = session('entreprise_id');


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
    
    try {
        // Récupération de l'ID de l'entreprise depuis l'utilisateur connecté
        

        if (!$entrepriseId) {
            return redirect()->route('offre')->with('error', 'ID d\'entreprise non trouvé');
        }
        // Création de l'offre
        $offre = new Offre([
            'titre_poste' => $validatedData['titre_poste'],
            'type_contrat' => $validatedData['type_contrat'],
            'duree_contrat' => $validatedData['duree_contrat'],
            'lieu_poste' => $validatedData['lieu_poste'],
            'date_debut' => $validatedData['date_debut'],
            'description_poste' => $validatedData['description_poste'],
            'competences_techniques' => json_encode($validatedData['competences_techniques']),
            'competences_transversales' => json_encode($validatedData['competences_transversales']),
            'langues_requises' => json_encode($validatedData['langues_requises']),
            'avantages' => $validatedData['avantages'] ?? null,
            'date_limite_candidature' => $validatedData['date_limite_candidature'],
            'entreprise_id' => $entrepriseId, // Utiliser l'ID d'entreprise approprié
        ]);

        $offre->save();

        // Récupération de la dernière requête SQL
        $lastQuery = DB::getQueryLog();
        $lastQuery = end($lastQuery);

        return redirect()->route('offre')
            ->with('success', 'Offre publiée avec succès')
            ->with('last_query', $lastQuery);
    } catch (\Exception $e) {
        return redirect()->route('offre')
            ->with('error', 'Une erreur est survenue lors de la publication de l\'offre : ' . $e->getMessage());
    }
}

    public function show($id)
{
    $offre = Offre::find($id);

    if (!$offre) {
        return redirect()->route('offers.index')->with('error', 'Offer not found');
    }

    return view('offers.show', compact('offre'));
}
public function index()
{
    $offers = Offre::all(); // or use appropriate query to get offers
    return view('etudiant.explorer-offres', compact('offers'));
}
public function apply($id)
{
    $offre = Offre::find($id);

    if (!$offre) {
        return redirect()->route('offers.index')->with('error', 'Offer not found');
    }

    // Check if the user has already applied for this offer
    if (Application::where('user_id', Auth::id())->where('offre_id', $id)->exists()) {
        return redirect()->back()->with('error', 'You have already applied for this job');
    }

    // Create a new application record
    Application::create([
        'user_id' => Auth::id(),
        'offre_id' => $id,
    ]);

    return redirect()->route('offers.index')->with('success', 'Application submitted successfully');
}
//public function appliedJobs()
//{
//    $appliedOffers = Application::where('user_id', Auth::id())
//        ->with('offre') // Assuming you have defined the relationship in the Application model
//        ->get()
///        ->pluck('offre');

//    return view('user.applied-jobs', compact('appliedOffers'));
//}

}
