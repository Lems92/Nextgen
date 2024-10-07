<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pays;
use App\Models\region;
use App\Models\Contrat;
use App\Models\CategorieDomaine;
use App\Models\CategorieNiveauEtude;
use App\Models\CategorieCompetence;
use App\Models\CategorieExperience;
use App\Models\Competence;
use App\Models\Experience;
use App\Models\NiveauEtude;
use App\Models\Domaine;

class redirectController extends Controller
{
    public function inscriptionEntreprise(Request $request){
        $regions = Region::all();
        $contrats = Contrat::all();
        $domaines = Domaine::all();

        return view('inscription.form-entreprise', compact('domaines','regions','contrats'));
    }

    public function inscriptionUniversite(Request $request){
        $regions = Region::all();
        $domaines = Domaine::all();
        $categories = CategorieDomaine::with('domaines')->get();
        $niveauEtudes = NiveauEtude::all();

        return view('inscription.form-servicecarriere', compact('niveauEtudes','regions','categories','domaines'));
    }

    public function inscriptionEtudiant(Request $request){
        $regions = Region::all();
        $domaines = Domaine::all();
        $niveauEtudes = CategorieNiveauEtude::with('niveaux')->get();
        $categories = CategorieDomaine::with('domaines')->get();
        $competences = CategorieCompetence::with('competences')->get();
        $experiences = CategorieExperience::with('experiences')->get();
        $contrats = Contrat::all();

        return view('inscription.form-etudiant',
        compact('niveauEtudes','regions','categories','domaines','competences','experiences','contrats'));

    }
}
