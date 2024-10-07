<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrepriseContrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'contrat_id',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }
}
