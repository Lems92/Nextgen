<?php

// app/Http/Controllers/UniversiteController.php

namespace App\Http\Controllers;

use App\Models\Universite;
use App\Models\UniversiteUser;
use App\Models\UniversiteDomaine;
use App\Models\User;
use Illuminate\Http\Request;

class UniversiteController extends Controller
{
    public function create()
    {
        return view('service.carriere');
    }

    public function store(Request $request)
    {

        try {

            $universite = new Universite();
            $universite->nom_etablissement = $request->nom_etablissement;
            $universite->region_id = $request->region_id;
            $universite->ville = $request->ville;
            $universite->code_postal = $request->code_postal;
            $universite->adresse = $request->adresse;
            $universite->site_web = $request->site_web;
            $universite->nombre_etudiants = $request->nombre_etudiants;
            $universite->save();

            $universite_user = new UniversiteUser();
            $universite_user->user_id = User::orderBy('id', 'desc')->first()->id;
            $universite_user->universite_id = $universite->id;
            $universite_user->nom = $request->nom;
            $universite_user->prenom = $request->prenom;
            $universite_user->fonction = $request->fonction;
            $universite_user->numero_telephone = $request->telephone;
            $universite_user->save();

            $domaines_etudes = $request->domaines_niveaux;
            if($domaines_etudes){
                foreach ( $domaines_etudes as $domaineNiveau) {
                list($domaineId, $niveauId) = explode('|', $domaineNiveau);
                $universite_domaines = new UniversiteDomaine();
                $universite_domaines->universite_id = $universite->id;
                $universite_domaines->domaine_id = $domaineId;
                $universite_domaines->niveau_etude_id = $niveauId;
                $universite_domaines->save();
            }

            echo 'ok';
        }

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

}
