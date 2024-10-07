<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieExperience extends Model
{
    use HasFactory;

    protected $fillable = ['type_experience', 'nom_categorie'];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
}
