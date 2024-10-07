<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    use HasFactory;

    protected $table = 'universites';  // Facultatif si le nom du modèle correspond déjà au nom de la table.

    protected $fillable = [
        'nom_etablissement',
        'region_id',
        'ville',
        'code_postal',
        'adresse',
        'site_web',
        'nombre_etudiants',
    ];

    // Relation avec UniversiteUser
    public function universiteUsers()
    {
        return $this->hasMany(UniversiteUser::class);
    }

    // Relation avec UniversiteDomaine
    public function universiteDomaines()
    {
        return $this->hasMany(UniversiteDomaine::class);
    }
}
