<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offre extends Model
{
    use HasFactory;

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
    ];

    protected $casts = [
        'competences_techniques' => 'array',
        'competences_transversales' => 'array',
        'langues_requises' => 'array',
    ];

    public function entreprise(): BelongsTo
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }

    /**
     * Convert the date_debut attribute to a Carbon instance.
     *
     * @param  string  $value
     * @return \Carbon\Carbon
     */
    public function getDateDebutAttribute($value)
    {
        return Carbon::parse($value);
    }
}
