<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantEtude extends Model
{
    use HasFactory;

    protected $table = 'etudiant_etudes'; // Nom de la table

    protected $fillable = [
        'etudiant_id',
        'domaine_id',
        'niveau_etude_id',
        'annee',
        'etat_diplome',
        'fichier_diplome',
    ];

    // Relation avec le modèle Etudiant
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    // Relation avec le modèle Domaine
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }

    // Relation avec le modèle NiveauEtude
    public function niveauEtude()
    {
        return $this->belongsTo(NiveauEtude::class);
    }
}
