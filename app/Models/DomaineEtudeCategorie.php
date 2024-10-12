<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DomaineEtudeCategorie extends Model implements Sluggable
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function domaines_etudes(): HasMany
    {
        return $this->hasMany(DomaineEtude::class);
    }

    public function slugAttribute(): string
    {
        return 'name';
    }
}
