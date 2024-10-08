<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    protected $fillable = [
        'email',
        'password',
        'userable_type',
        'userable_id',
    ];

    // Relation polymorphique
    public function userable() {
        return $this->morphTo();
    }

    protected $casts = [
        'userable_type' => 'string',
        'userable_id' => 'integer',
    ];
}

