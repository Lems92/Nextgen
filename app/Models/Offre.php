<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Offre extends Model implements Sluggable
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'titre_poste',
        'type_contrat',
        'duree_contrat',
        'lieu_poste',
        'date_debut',
        'description_poste',
        'competences_techniques',
        'competences_transversales',
        'langues_requises',
        'avantages',
        'date_limite_candidature',
        'entreprise_id',
        'slug'
    ];

    protected $casts = [
        'competences_techniques' => 'array',
        'competences_transversales' => 'array',
        'langues_requises' => 'array',
        'date_limite_candidature' => 'date',
        'date_debut' => 'date',
    ];

    protected $appends = [
        'competences_transversales_formated',
        'competences_transversales_formated',
        'langues_requises_formated',
    ];

    public function entreprise(): BelongsTo
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }

    public function etudiants(): BelongsToMany
    {
        return $this->belongsToMany(Etudiant::class, 'postulations')
            ->withPivot('id')
            ->withTimestamps();
    }


    /*public function getDateDebutAttribute($value)
    {
        return Carbon::parse($value);
    }*/

    public function slugAttribute(): string
    {
        return 'titre_poste';
    }

    public function getCompetencesTransversalesFormatedAttribute()
    {
        $new_array = [];
        foreach ($this->competences_transversales as $sigle) {
            $param = Parametrage::where('sigle', 'LIKE', $sigle)->first();
            $new_array[] = $param->libelle;
        }
        return $new_array;
    }

    public function getCompetencesTechniquesFormatedAttribute()
    {
        $new_array = [];
        foreach ($this->competences_techniques as $sigle) {
            $param = Parametrage::where('sigle', 'LIKE', $sigle)->first();
            $new_array[] = $param->libelle;
        }
        return $new_array;
    }

    public function getLanguesRequisesFormatedAttribute()
    {
        $new_array = [];
        foreach ($this->langues_requises as $sigle) {
            $param = Parametrage::where('sigle', 'LIKE', $sigle)->first();
            $new_array[] = $param->libelle;
        }
        return $new_array;
    }
}
