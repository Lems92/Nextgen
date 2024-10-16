<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Entreprise extends Model implements Sluggable
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'id',
        'nom_entreprise',
        'secteur_activite',
        'adresse',
        'complement_adresse',
        'code_postal',
        'ville',
        'region',
        'pays',
        'site_web',
        'date_creation',
        'nom_contact',
        'fonction_contact',
        'email_contact',
        'telephone_contact',
        'opportunities',
        'domaines_activites',
        'inclusion_diversity',
        'training_support',
        'selected_offer',
        'profile_picture',
        'description',
        'slug',
    ];

    protected $casts = [
        'opportunities' => 'array',
        'domaines_activites' => 'array',
        'inclusion_diversity' => 'array',
        'training_support' => 'array',
        'date_creation' => 'date',
    ];


    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function offres(): HasMany
    {
        return $this->hasMany(Offre::class, 'entreprise_id');
    }

    public function __toString()
    {
        return $this->nom_entreprise;
    }

    public function slugAttribute(): string
    {
        return 'nom_entreprise';
    }

    public function getParametrageLibelle(string $attribute): ?string
    {
        $attr = $this->attributes[$attribute];

        $param = Parametrage::where('sigle', 'LIKE', $attr)->first();

        return $param->libelle;
    }

    public function getParametrageLibelleArray(string $attribute): array
    {
        $new_array = [];
        $attr = json_decode($this->attributes[$attribute], true);
        if(is_array($attr)) {
            foreach ($attr as $sigle) {
                $param = Parametrage::where('sigle', 'LIKE', $sigle)->first();
                $new_array[] = $param->libelle;
            }
        }
        return $new_array;
    }

    public function __get($key)
    {
        // Vérifier si l'attribut demandé est dans les attributs de l'objet
        if (array_key_exists($key, $this->attributes)) {
            // Vérifier si un paramétrage doit être appliqué
            /*if ($key == 'secteur_activite') {
                return $this->getParametrageLibelle($key);
            }*/

            // Si c'est un tableau
            if (in_array($key, [
                'opportunities',
                'inclusion_diversity',
                'training_support',
            ])) {
                return $this->getParametrageLibelleArray($key);
            }

            if($key == 'domaines_activites') {
                return json_decode($this->attributes[$key]);
            }

            // Si l'attribut est casté dans $casts, utiliser le cast
            if (array_key_exists($key, $this->casts)) {
                $castType = $this->casts[$key];

                // Gérer les types de cast spécifiques, par exemple pour les dates
                if ($castType === 'date' || $castType === 'datetime') {
                    return \Carbon\Carbon::parse($this->attributes[$key])->format('d F Y'); // Par exemple, formatage des dates
                }
            }

            // Retourner l'attribut brut si aucune transformation n'est nécessaire
            return $this->attributes[$key];
        }

        // Si la propriété n'est pas dans les attributs de l'objet, utiliser le comportement par défaut
        return parent::__get($key);
    }
}


