<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListWithCategory extends Model implements Sluggable
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'list_categorie_id'
    ];

    public function list_categorie(): BelongsTo
    {
        return $this->belongsTo(ListCategorie::class, 'list_categorie_id');
    }
    public function slugAttribute(): string
    {
        return 'name';
    }
}
