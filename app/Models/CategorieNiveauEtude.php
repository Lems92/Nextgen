<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieNiveauEtude extends Model
{
    use HasFactory;

    protected $fillable = ['nom_categorie'];

    public function niveaux()
    {
        return $this->hasMany(NiveauEtude::class);
    }
}
