<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EtudiantUniversite extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'etudiant_id',
        'universite_id',
    ];

    public function etudiant(): BelongsTo
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function universite(): BelongsTo
    {
        return $this->belongsTo(Universite::class);
    }
}
