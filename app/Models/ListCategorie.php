<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ListCategorie extends Model implements Sluggable
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'table',
        'name',
        'slug'
    ];

    public function list_with_categories(): HasMany
    {
        return $this->hasMany(ListWithCategory::class);
    }

    public function slugAttribute(): string
    {
        return 'name';
    }
}
