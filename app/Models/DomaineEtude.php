<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DomaineEtude extends Model implements Sluggable
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'domaine_etude_categorie_id'
    ];

    public function domaine_etude_categorie(): BelongsTo
    {
        return $this->belongsTo(DomaineEtudeCategorie::class, 'domaine_etude_categorie_id');
    }
    public function slugAttribute(): string
    {
        return 'name';
    }
}
