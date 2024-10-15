<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Postulation extends Model
{
    use HasFactory;

    protected $fillable = ['etudiant_id', 'offre_id'];

    public function etudiant(): BelongsTo
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function offre(): BelongsTo
    {
        return $this->belongsTo(Offre::class);
    }
}
