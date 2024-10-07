<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantPreferenceContrat extends Model
{
    use HasFactory;

    protected $table = 'etudiant_preference_contrats';

    protected $fillable = [
        'etudiant_id',
        'contrat_id',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }
}
