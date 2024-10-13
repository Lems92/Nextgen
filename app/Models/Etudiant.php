<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Etudiant extends Model implements Sluggable
{
    use HasFactory, HasSlug;

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
        /*'titre_stage_academique',
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
        'description_autres_experiences',*/
        'competences_techniques',
        'competences_en_recherche_et_analyse',
        'competences_en_communication',
        'competences_interpersonnelles',
        'competences_resolution_problemes',
        'competences_adaptabilite',
        'competences_gestion_stress',
        'competences_leadership',
        'competences_ethique_responsabilite',
        'competences_gestion_financiere',
        'competences_langues',
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
        'orientation_sexuelle',
        'slug'
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function experiences_academiques(): HasMany
    {
        return $this->hasMany(ExperienceAcademique::class);
    }

    protected $casts = [
        'date_naissance' => 'date',
        'vacances_ete_debut' => 'date',
        'vacances_ete_fin' => 'date',
        'accessibilite' => 'boolean',
        'competences_techniques' => 'array',
        'competences_en_recherche_et_analyse' => 'array',
        'competences_en_communication' => 'array',
        'competences_interpersonnelles' => 'array',
        'competences_resolution_problemes' => 'array',
        'competences_adaptabilite' => 'array',
        'competences_gestion_stress' => 'array',
        'competences_leadership' => 'array',
        'competences_ethique_responsabilite' => 'array',
        'competences_gestion_financiere' => 'array',
        'competences_langues' => 'array',
        'secteur_activite_preferer' => 'array',
        'type_emploi_recherche' => 'array',
        'dates_disponibles_vacances_ete_debut' => 'date',
        'dates_disponibles_vacances_ete_fin' => 'date',
    ];

    public function __toString()
    {
        return $this->prenom;
    }

    public function slugAttribute(): string
    {
        return 'prenom';
    }
}
