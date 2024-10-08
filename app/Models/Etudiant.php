<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiants';

    protected $fillable = [
        'prenom',
        'nom',
        //'adresse_email',
        'numero_telephone',
        'date_naissance',
        'genre',
        'adresse_postale',
        'pays',
        'region',
        'ville',
        'code_postal',
        'nom_ecole_universite',
        'domaine_etudes',
        'niveau_etudes',
        'annee_obtention_diplome',
        'titre_stage_academique',
        'annee_stage_academique',
        'duree_stage_academique',
        'description_stage_academique',
        'titre_projet_academique',
        'annee_projet_academique',
        'duree_projet_academique',
        'description_projet_academique',
        'titre_these_memoire',
        'annee_these_memoire',
        'duree_these_memoire',
        'description_these_memoire',
        'titre_realisations',
        'annee_realisations',
        'duree_realisations',
        'description_realisations',
        'titre_cours_specialises',
        'annee_cours_specialises',
        'duree_cours_specialises',
        'description_cours_specialises',
        'titre_autres_experiences',
        'annee_autres_experiences',
        'duree_autres_experiences',
        'description_autres_experiences',
        'competences_techniques',
        'competences_recherche_analyse',
        'competences_communication',
        'competences_transversales',
        'experience_professionnelle',
        'portfolio',
        'centres_interet',
        'document_diplome',
        'document_recommandation',
        'secteur_activite_preferer',
        'type_emploi_recherche',
        'localisation_geographique_preferee',
        'salaire_souhaite',
        'duree_disponibilite',
        'semestre_cours',
        'vacances_ete_debut',
        'vacances_ete_fin',
        'dates_disponibles_vacances_ete_debut',
        'dates_disponibles_vacances_ete_fin',
        'accessibilite',
        'details_accessibilite',
        'origine_ethnique',
        'statut_socio_economique',
        'conditions_vie_specifiques',
        'religion_belief',
        'orientation_sexuelle'
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    protected $casts = [
        'date_naissance' => 'date',
        'vacances_ete_debut' => 'date',
        'vacances_ete_fin' => 'date',
        'accessibilite' => 'boolean',
        'secteur_activite_preferer' => 'array',
        'type_emploi_recherche' => 'array',
    ];
}
