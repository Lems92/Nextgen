<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceAcademique extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'type',
        'titre',
        'annee',
        'duree',
        'description'
    ];

    public function etudiant(): void
    {
        $this->belongsTo(Etudiant::class);
    }
}
