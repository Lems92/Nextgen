<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantPreferenceRegion extends Model
{
    use HasFactory;

    protected $table = 'etudiant_preference_regions';

    protected $fillable = [
        'etudiant_id',
        'region_id',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
