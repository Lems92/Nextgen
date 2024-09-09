<?php

// app/Http/Controllers/UniversiteController.php

namespace App\Http\Controllers;

use App\Models\Universite;
use Illuminate\Http\Request;

class UniversiteController extends Controller
{
    public function create()
    {
        return view('service.carriere');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom_etablissement' => 'required|string|max:255',
            'adresse_etablissement' => 'required|string|max:255',
            'site_web' => 'nullable|string|max:255',
            'nom_fonction' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'nombre_etudiants' => 'required|string',
            'domaines_etudes' => 'required|array',
            'niveaux_etudes' => 'required|array',
        ]);

        try {
            // Création de l'université
            $universite = new Universite([
                'nom_etablissement' => $validatedData['nom_etablissement'],
                'adresse_etablissement' => $validatedData['adresse_etablissement'],
                'site_web' => $validatedData['site_web'] ?? null,
                'nom_fonction' => $validatedData['nom_fonction'],
                'email' => $validatedData['email'],
                'telephone' => $validatedData['telephone'],
                'nombre_etudiants' => $validatedData['nombre_etudiants'],
                'domaines_etudes' => $validatedData['domaines_etudes'],
                'niveaux_etudes' => $validatedData['niveaux_etudes'],
            ]);

            $universite->save();

            return redirect()->route('connexion')->with('success', 'Les informations de l’établissement ont été enregistrées avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }
}
