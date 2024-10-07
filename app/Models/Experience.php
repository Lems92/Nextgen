<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = ['categorie_experience_id', 'nom_experience', 'description'];

    public function categorie()
    {
        return $this->belongsTo(CategorieExperience::class, 'categorie_experience_id');
    }
}

