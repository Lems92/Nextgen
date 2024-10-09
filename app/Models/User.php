<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, Sluggable
{
    use HasFactory, Notifiable, HasRoles, HasSlug;
    protected $fillable = [
        'email',
        'password',
        'userable_type',
        'userable_id',
        'is_accepted_by_admin',
        'slug',
    ];

    // Relation polymorphique
    public function userable() {
        return $this->morphTo();
    }

    protected $casts = [
        'userable_type' => 'string',
        'userable_id' => 'integer',
    ];

    public function slugAttribute(): string
    {
        if (is_null($this->userable)) {
            return 'email';
        }
        return 'userable';
    }
}

