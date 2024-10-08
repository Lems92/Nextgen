<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Universite extends Model
{
    use HasFactory;

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
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    protected $casts = [
        'domaines_etudes_proposes' => 'array',
        'niveaux_etudes_proposes' => 'array',
    ];
}
