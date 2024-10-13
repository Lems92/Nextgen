<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExperienceProfessionnelle extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'titre_poste',
        'nom_entreprise',
        'date_debut',
        'date_fin',
        'description',
        'lieu',
        'secteur',
        'type_contrat',
        'salaire'
    ];

    public function etudiant(): BelongsTo
    {
        return $this->belongsTo(Etudiant::class);
    }

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];
}
