<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $table = 'competences'; // Le nom exact de la table

    protected $fillable = [
        'categorie_competence_id',
        'nom_competence',
        'description'
    ];

    // Relation inverse avec le modèle CategorieCompetence
    public function categorieCompetence()
    {
        return $this->belongsTo(CategorieCompetence::class, 'categorie_competence_id');
    }
}
