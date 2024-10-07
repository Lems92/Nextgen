<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantExperience extends Model
{
    use HasFactory;

    protected $table = 'etudiant_experiences';

    protected $fillable = [
        'etudiant_id',
        'experience_id',
        'details',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
