<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantPreferenceDomaine extends Model
{
    use HasFactory;

    protected $table = 'etudiant_preference_domaines';

    protected $fillable = [
        'etudiant_id',
        'domaine_id',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
}
