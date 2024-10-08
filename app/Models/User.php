<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    protected $fillable = ['email', 'password', 'role','universite_id','entreprise_id',];

    public function entreprise()
    {
        return $this->hasOne(Entreprise::class, 'user_id');
    }
}

