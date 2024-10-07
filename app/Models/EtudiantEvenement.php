<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantEvenement extends Model
{
    use HasFactory;

    protected $table = 'etudiant_evenements';

    protected $fillable = [
        'etudiant_id',
        'evenement_id',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
