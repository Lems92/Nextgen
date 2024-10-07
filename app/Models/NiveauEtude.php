<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauEtude extends Model
{
    use HasFactory;

    protected $fillable = ['categorie_niveau_etude_id', 'nom_niveau_etude', 'description'];

    public function categorie()
    {
        return $this->belongsTo(CategorieNiveauEtude::class, 'categorie_niveau_etude_id');
    }
}
