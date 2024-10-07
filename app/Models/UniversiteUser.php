<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversiteUser extends Model
{
    use HasFactory;

    protected $table = 'universite_users';

    protected $fillable = [
        'user_id',
        'universite_id',
        'nom',
        'prenom',
        'fonction',
        'numero_telephone',
    ];

    // Relation avec Universite
    public function universite()
    {
        return $this->belongsTo(Universite::class);
    }

    // Relation avec User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
