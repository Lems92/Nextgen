<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DemandeAffiliationUniversite extends Model implements Sluggable
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'etudiant_id',
        'universite_id',
        'matricule',
        'document_scolaire',
        'slug'
    ];

    public function slugAttribute(): string
    {
        return 'matricule';
    }

    public function etudiant(): BelongsTo
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function universite(): BelongsTo
    {
        return $this->belongsTo(Universite::class);
    }
}
