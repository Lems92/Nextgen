<?php

// app/Models/Universite.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected $casts = [
        'domaines_etudes' => 'array',
        'niveaux_etudes' => 'array',
    ];
}
