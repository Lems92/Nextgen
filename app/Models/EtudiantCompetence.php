<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantCompetence extends Model
{
    use HasFactory;

    protected $table = 'etudiant_competences';

    protected $fillable = [
        'etudiant_id',
        'competence_id',
        'details',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }
}
