<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_entreprise',
        'region_id',
        'ville',
        'code_postal',
        'adresse',
        'site_web',
        'taille_entreprise',
        'description',
    ];

    public function users()
    {
        return $this->hasMany(EntrepriseUser::class);
    }

    public function domaines()
    {
        return $this->belongsToMany(Domaine::class, 'entreprise_domaines');
    }

    public function contrats()
    {
        return $this->belongsToMany(Contrat::class, 'entreprise_contrats');
    }
}
