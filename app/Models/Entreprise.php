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
        'slug',
    ];

    protected $casts = [
        'opportunities' => 'array',
        'domaines_activites' => 'array',
        'inclusion_diversity' => 'array',
        'training_support' => 'array',
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
}


