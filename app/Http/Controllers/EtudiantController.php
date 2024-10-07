<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function store(Request $request)
    {
        try{
            $etudiant = new Etudiant();
            $etudiant->user_id = User::orderBy('id', 'desc')->first()->id;
            $etudiant->nom = $request->nom;
            $etudiant->prenom = $request->prenom;
            $etudiant->numero_telephone = $request->numero_telephone;
            $etudiant->date_naissance = $request->date_naissance;
            $etudiant->genre = $request->genre;
            $etudiant->region_id =  $request->region_id;
            $etudiant->ville = $request->ville;
            $etudiant->nom_etablissement = $request->nom_etablissement;
            $etudiant->centre_interet = $request->centre_interet;
            $etudiant->fichier_recommandation = $request->fichier_recommandation ;
            $etudiant->photo = $request->photo;
            $etudiant->save();


            $competences = $request->competences;
            if($competences){
                foreach($competences as $competence){
                    $etudiant_competence = new EtudiantCompetence();
                    $etudiant_competence->etudiant_id = $etudiant->id;
                    $etudiant_competence->competence_id = $competence;
                    $etudiant_competence->details = 'null';
                    $etudiant_competence->save();
                }

            }


            $etudiant_etudes = new EtudiantEtude();
            $etudiant_etudes->etudiant_id = $etudiant->id;
            $etudiant_etudes->domaine_id = $etudiant->domaine_id;
            $etudiant_etudes->niveau_etude_id = $request->niveau_etude_id;
            $etudiant_etudes->etat_diplome = $request->etat_diplome;
            $etudiant_etudes->annee = $request->annee;
            $etudiant_etudes->fichier_diplome = $request->fichier_diplome;
            $etudiant_etudes->save();

            $etudiant_experiences = new EtudiantExperience();
            $etudiant_experiences->etudiant_id = $etudiant->id;
            $etudiant_experiences->experience_id = $request->experience_id;
            $etudiant_experiences->details = $request->details;
            $etudiant_experiences->save();

            $etudiant_portfolios = new EtudiantPortfolio();
            $etudiant_portfolios->etudiant_id = $etudiant->id;
            $etudiant_portfolios->lien = $request->lien ;
            $etudiant_portfolios->description = $request->description ;
            $etudiant_portfolios->save();

            $etudiant_preference_contrats = new EtudiantPreferenceContrat();
            $etudiant_preference_contrats->etudiant_id  = $etudiant->id;
            $etudiant_preference_contrats->contrat_id = $request->contrat_id;
            $etudiant_preference_contrats->save();

            $etudiant_preference_domaines = new EtudiantPreferenceDomaine();
            $etudiant_preference_domaines->etudiant_id  = $etudiant->id;
            $etudiant_preference_domaines->domaine_id = $request->domaine_id;
            $etudiant_preference_domaines->save();

            $etudiant_preference_regions = new EtudiantPreferenceRegion();
            $etudiant_preference_regions->etudiant_id  = $etudiant->id;
            $etudiant_preference_regions->domaine_id = $request->domaine_id;
            $etudiant_preference_regions->save();

            $etudiants_details_specifiques = new EtudiantDetailsSpecifiques();
            $etudiants_details_specifiques->etudiant_id  = $etudiant->id;
            $etudiants_details_specifiques->origine_ethnique  = ;
            $etudiants_details_specifiques->statut_socio_econimique  = ;
            $etudiants_details_specifiques->religion  = ;
            $etudiants_details_specifiques->orientation_sexuelle = ;
            $etudiants_details_specifiques->condition_vie = ;
            $etudiants_details_specifiques->save()


        }
        catch (\Exception $e) {
            // Gestion des erreurs
            echo $e->getMessage();
            // return redirect()->back()->withErrors(['error' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }
    }
}
