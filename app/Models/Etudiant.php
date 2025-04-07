<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Carbon\Carbon;

class Etudiant extends Model implements Sluggable
{
    use HasFactory, HasSlug;

    protected $table = 'etudiants';

    protected $fillable = [
        'prenom',
        'nom',
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
        'competences_techniques',
        'competences_en_recherche_et_analyse',
        'competences_en_communication',
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
        'description',
        'profile_picture',
        'slug',
    ];

    protected $casts = [
        'competences_techniques' => 'array',
        'competences_en_recherche_et_analyse'  => 'array',
        'competences_en_communication'  => 'array',
        'competences_langues' => 'array',
        'date_naissance' => 'date',
        'vacances_ete_debut' => 'date',
        'vacances_ete_fin' => 'date',
        'accessibilite' => 'boolean',
        'secteur_activite_preferer' => 'array',
        'type_emploi_recherche' => 'array',
        'dates_disponibles_vacances_ete_debut' => 'date',
        'dates_disponibles_vacances_ete_fin' => 'date',
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function experiences_academiques(): HasMany
    {
        return $this->hasMany(ExperienceAcademique::class);
    }

    public function experiences_professionnelles(): HasMany
    {
        return $this->hasMany(ExperienceProfessionnelle::class);
    }

    public function offres_postules(): BelongsToMany
    {
        return $this->belongsToMany(Offre::class, 'postulations')
            ->withPivot('id')
            ->withTimestamps();
    }

    public function universites(): HasMany
    {
        return $this->hasMany(EtudiantUniversite::class);
    }

    public function __toString(): string
    {
        return $this->prenom;
    }

    public function slugAttribute(): string
    {
        return 'prenom';
    }

    public function getParametrageLibelle(string $attribute): ?string
    {
        $attr = $this->attributes[$attribute] ?? null;

        if ($attr) {
            $param = Parametrage::where('sigle', 'LIKE', $attr)->first();
            return $param ? $param->libelle : null;
        }

        return null;
    }

    public function getParametrageLibelleArray(string $attribute): array
    {
        $new_array = [];
        $attr = json_decode($this->attributes[$attribute] ?? '[]', true);

        if (is_array($attr)) {
            foreach ($attr as $sigle) {
                $param = Parametrage::where('sigle', 'LIKE', $sigle)->first();
                if ($param) {
                    $new_array[] = $param->libelle;
                }
            }
        }

        return $new_array;
    }

    public function __get($key)
    {
        // Vérifier si l'attribut demandé est dans les attributs de l'objet
        if (array_key_exists($key, $this->attributes)) {
            // Vérifier si un paramétrage doit être appliqué
            if (in_array($key, [
                'genre', 'niveau_etudes', 'duree_disponibilite', 'statut_socio_economique', 'conditions_vie_specifiques',
                'religion_belief', 'orientation_sexuelle'
            ])) {
                return $this->getParametrageLibelle($key);
            }

            // Si c'est un tableau
            if (in_array($key, [
                'type_emploi_recherche',
            ])) {
                return $this->getParametrageLibelleArray($key);
            }

            if ($key === 'secteur_activite_preferer') {
                return json_decode($this->attributes[$key], true);
            }

            // Si l'attribut est casté dans $casts, utiliser le cast
            if (array_key_exists($key, $this->casts)) {
                $castType = $this->casts[$key];

                // Gérer les types de cast spécifiques, par exemple pour les dates
                if ($castType === 'date' || $castType === 'datetime') {
                    return Carbon::parse($this->attributes[$key])->format('d F Y');
                }
            }

            // Retourner l'attribut brut si aucune transformation n'est nécessaire
            return $this->attributes[$key];
        }

        // Si la propriété n'est pas dans les attributs de l'objet, utiliser le comportement par défaut
        return parent::__get($key);
    }
}
