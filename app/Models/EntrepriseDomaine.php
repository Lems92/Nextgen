<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrepriseDomaine extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'domaine_id',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
}
