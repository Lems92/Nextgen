<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Models\Permission;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    /**
     * Les entreprises qui ont cet abonnement.
     */
    public function entreprises(): HasMany
    {
        return $this->hasMany(Entreprise::class);
    }

    /**
     * Les permissions associées à cet abonnement.
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'subscription_permission');
    }

}
