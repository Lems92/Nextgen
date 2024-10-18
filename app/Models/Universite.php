<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Universite extends Model implements Sluggable
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'nom_etablissement',
        'adresse_etablissement',
        'site_web',
        'nom_contact',
        'fonction_contact',
        'adresse_email_contact',
        'numero_telephone_contact',
        'nombre_etudiants',
        'domaines_etudes_proposes',
        'niveaux_etudes_proposes',
        'description',
        'profile_picture',
        'slug'
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function etudiants(): HasMany
    {
        return $this->hasMany(EtudiantUniversite::class);
    }

    protected $casts = [
        'domaines_etudes_proposes' => 'array',
        'niveaux_etudes_proposes' => 'array',
    ];

    public function __toString()
    {
        return $this->nom_etablissement;
    }

    public function slugAttribute(): string
    {
        return 'nom_etablissement';
    }

    public function getNiveauxEtudesProposesAttribute(): array
    {
        $new_array = [];
        $attr = json_decode($this->attributes['niveaux_etudes_proposes'], true);
        if(is_array($attr)) {
            foreach ($attr as $sigle) {
                $param = Parametrage::where('sigle', 'LIKE', $sigle)->first();
                $new_array[] = $param->libelle;
            }
        }
        return $new_array;
    }
}
