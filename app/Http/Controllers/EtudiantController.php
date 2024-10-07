<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'adresse_email' => 'required|email|unique:etudiants,adresse_email',
            'numero_telephone' => 'nullable|string|max:20',
            'date_naissance' => 'nullable|date',
            'genre' => 'nullable|in:Homme,Femme,Autre',
            'adresse_postale' => 'nullable|string',
            'pays' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'ville' => 'nullable|string|max:100',
            'code_postal' => 'nullable|string|max:10',
            'nom_ecole_universite' => 'nullable|string|max:255',
            'domaine_etudes' => 'nullable|in:Sciences,Ingénierie,Arts,Commerce,Médecine,Droit,Économie,Architecture,Sciences sociales,Sciences de la vie,Sciences de l\'environnement,Éducation,Tourisme et hôtellerie,Agriculture et environnement rural,Technologies de l\'information,Communication,Langues et cultures,Sciences politiques,Gestion,Sciences de la santé',
            'niveau_etudes' => 'nullable|in:Licence,Master,Doctorat',
            'annee_obtention_diplome' => 'nullable|string|max:10',
            'titre_stage_academique' => 'nullable|string|max:255',
            'annee_stage_academique' => 'nullable|string|max:10',
            'duree_stage_academique' => 'nullable|string|max:50',
            'description_stage_academique' => 'nullable|string',
            'titre_projet_academique' => 'nullable|string|max:255',
            'annee_projet_academique' => 'nullable|string|max:10',
            'duree_projet_academique' => 'nullable|string|max:50',
            'description_projet_academique' => 'nullable|string',
            'titre_these_memoire' => 'nullable|string|max:255',
            'annee_these_memoire' => 'nullable|string|max:10',
            'duree_these_memoire' => 'nullable|string|max:50',
            'description_these_memoire' => 'nullable|string',
            'titre_realisations' => 'nullable|string|max:255',
            'annee_realisations' => 'nullable|string|max:10',
            'duree_realisations' => 'nullable|string|max:50',
            'description_realisations' => 'nullable|string',
            'titre_cours_specialises' => 'nullable|string|max:255',
            'annee_cours_specialises' => 'nullable|string|max:10',
            'duree_cours_specialises' => 'nullable|string|max:50',
            'description_cours_specialises' => 'nullable|string',
            'titre_autres_experiences' => 'nullable|string|max:255',
            'annee_autres_experiences' => 'nullable|string|max:10',
            'duree_autres_experiences' => 'nullable|string|max:50',
            'description_autres_experiences' => 'nullable|string',
            'competences_techniques' => 'nullable|string',
            'competences_recherche_analyse' => 'nullable|string',
            'competences_communication' => 'nullable|string',
            'competences_transversales' => 'nullable|string',
            'experience_professionnelle' => 'nullable|string',
            'portfolio' => 'nullable|string',
            'centres_interet' => 'nullable|string',
            'document_diplome' => 'nullable|string|max:255',
            'document_recommandation' => 'nullable|string|max:255',
            'secteur_activite_preferer' => 'nullable|in:Technologie de l\'Information,Santé,Finance et Comptabilité,Ingénierie,Commerce et Marketing,Éducation et Formation,Arts et Création,Sciences et Recherche,Tourisme et Hôtellerie,Droit et Juridique,Agriculture et Environnement,Énergie et Ressources Naturelles,Transport et Logistique,Développement et Humanitaire,Télécommunications',
            'type_emploi_recherche' => 'nullable|in:CDI,Stage,Contrat à durée déterminée,Freelance,Alternance',
            'localisation_geographique_preferee' => 'nullable|string',
            'salaire_souhaite' => 'nullable|string|max:100',
            'duree_disponibilite' => 'nullable|in:Moins de 1 mois,1 à 3 mois,3 à 6 mois,6 à 12 mois,Plus de 12 mois',
            'semestre_cours' => 'nullable|in:Semestre 1,Semestre 2',
            'vacances_ete_debut' => 'nullable|date',
            'vacances_ete_fin' => 'nullable|date',
            'dates_disponibles_vacances_ete' => 'nullable|string',
            'accessibilite' => 'nullable|boolean',
            'details_accessibilite' => 'nullable|string',
            'origine_ethnique' => 'nullable|string',
            'statut_socio_economique' => 'nullable|in:Origine modeste,Classe moyenne,Préfère ne pas dire',
            'conditions_vie_specifiques' => 'nullable|in:Sans domicile fixe,En situation de handicap,Préfère ne pas dire',
            'religion_belief' => 'nullable|in:Chrétien,Musulman,Bouddhiste,Hindou,Préfère ne pas dire',
            'orientation_sexuelle' => 'nullable|in:Hétérosexuel,Homosexuel,Bisexuel,Préfère ne pas dire',
        ]);

        Etudiant::create($validatedData);

        //return response()->json(['message' => 'Étudiant enregistré avec succès'], 201);*
        echo "ok";
    }
}
