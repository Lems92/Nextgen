<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiants';

    protected $fillable = [
        'user_id',
        'nom',
        'prenom',
        'numero_telephone',
        'date_naissance',
        'genre',
        'region_id',
        'ville',
        'code_postal',
        'adresse',
        'nom_etablissement',
        'centre_interet',
        'fichier_recommandation',
        'photo',
    ];

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'etudiant_competences')
                    ->withPivot('details');
    }

    public function evenements()
    {
        return $this->belongsToMany(Evenement::class, 'etudiant_evenements');
    }

    public function experiences()
    {
        return $this->belongsToMany(Experience::class, 'etudiant_experiences')
                    ->withPivot('details');
    }

    public function portfolios()
    {
        return $this->hasMany(EtudiantPortfolio::class);
    }

    public function preferenceContrats()
    {
        return $this->hasMany(EtudiantPreferenceContrat::class);
    }

    public function preferenceDomaines()
    {
        return $this->hasMany(EtudiantPreferenceDomaine::class);
    }

    public function preferenceRegions()
    {
        return $this->hasMany(EtudiantPreferenceRegion::class);
    }

    public function detailsSpecifiques()
    {
        return $this->hasOne(EtudiantDetailsSpecifiques::class);
    }
}
