<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversiteDomaine extends Model
{
    use HasFactory;

    protected $table = 'universite_domaines';

    protected $fillable = [
        'universite_id',
        'domaine_id',
        'niveau_etude_id',
    ];

    // Relation avec Universite
    public function universite()
    {
        return $this->belongsTo(Universite::class);
    }

    // Relation avec Domaine
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }

    // Relation avec NiveauEtude
    public function niveauEtude()
    {
        return $this->belongsTo(NiveauEtude::class);
    }
}
