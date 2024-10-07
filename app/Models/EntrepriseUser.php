<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrepriseUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'user_id',
        'nom',
        'prenom',
        'fonction',
        'numero_telephone',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
