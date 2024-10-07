<?php

// app/Http/Controllers/EntrepriseController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\EntrepriseDomaine;
use App\Models\EntrepriseUser;
use App\Models\User;
use App\Models\EntrepriseContrat;
use Illuminate\Support\Facades\Auth;


class EntrepriseController extends Controller
{
    public function store(Request $request)
    {
        try {
            $entreprise = new Entreprise();
            $entreprise->nom_entreprise = $request->nom_entreprise;
            $entreprise->region_id =  $request->region_id;
            $entreprise->ville = $request->ville;
            $entreprise->code_postal = $request->code_postal;
            $entreprise->site_web = $request->site_web;
            $entreprise->taille_entreprise = $request->taille_entreprise;
            $entreprise->description = 'a';
            $entreprise->adresse = $request->adresse;
            $entreprise->taille_entreprise = '100 à 200';
            $entreprise->save();

            $contrats = $request->input('contrats');
            $domaines = $request->input('domaines');

            if ($contrats) {
                foreach ($contrats as $contrat) {
                    $entrepriseContrat = new EntrepriseContrat();
                    $entrepriseContrat->contrat_id = $contrat;
                    $entrepriseContrat->entreprise_id = $entreprise->id;
                    $entrepriseContrat->save();
                }
            } else {
                echo "Aucune opportunité sélectionnée.";
            }

            if ($domaines) {
                foreach ($domaines as $domaine) {
                    $entrepriseDomaine = new EntrepriseDomaine();
                    $entrepriseDomaine->domaine_id = $domaine; // Correction ici pour utiliser domaine_id
                    $entrepriseDomaine->entreprise_id = $entreprise->id;
                    $entrepriseDomaine->save();
                }
            } else {
                echo "Aucun domaine sélectionné.";
            }

            $entrepriseUser = new EntrepriseUser();
            $entrepriseUser->entreprise_id = $entreprise->id;
            $entrepriseUser->user_id = User::orderBy('id', 'desc')->first()->id; // Récupération de l'ID
            $entrepriseUser->nom = $request->contact_name;
            $entrepriseUser->prenom = 'null';
            $entrepriseUser->fonction = $request->contact_position;
            $entrepriseUser->numero_telephone = $request->contact_phone;
            $entrepriseUser->save();

            // Redirection en cas de succès
            // return redirect()->route('entreprise.success')->with('status', 'Entreprise créée avec succès !');
        } catch (\Exception $e) {
            // Gestion des erreurs
            echo $e->getMessage();
            // return redirect()->back()->withErrors(['error' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }

    }
}
