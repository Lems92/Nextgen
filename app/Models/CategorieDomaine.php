<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieDomaine extends Model
{
    use HasFactory;

    protected $fillable = ['nom_categorie'];

    public function domaines()
    {
        return $this->hasMany(Domaine::class);
    }
}

