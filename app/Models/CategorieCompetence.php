<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieCompetence extends Model
{
    use HasFactory;

    protected $table = 'categorie_competences'; // Le nom exact de la table

    protected $fillable = [
        'type_competence',
        'nom_categorie'
    ];

    // Relation avec le modèle Competence
    public function competences()
    {
        return $this->hasMany(Competence::class, 'categorie_competence_id');
    }
}
