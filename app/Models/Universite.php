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
        'nom_fonction',
        'email',
        'telephone',
        'nombre_etudiants',
        'domaines_etudes',
        'niveaux_etudes',
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    protected $casts = [
        'domaines_etudes' => 'array',
        'niveaux_etudes' => 'array',
    ];
}
