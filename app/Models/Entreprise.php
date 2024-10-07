<?php
// app/Models/Entreprise.php

// app/Models/Entreprise.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'nom_entreprise',
        'secteur_activite',
        'adresse',
        'complement_adresse',
        'code_postal',
        'ville',
        'region',
        'pays',
        'site_web',
        'date_creation',
        'nom_contact',
        'fonction_contact',
        'email_contact',
        'telephone_contact',
        'opportunities',
        'fields',
        'inclusion_diversity',
        'training_support',
        'selected_offer',   
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function offres()
    {
        return $this->hasMany(Offre::class, 'entreprise_id');
    }
}


