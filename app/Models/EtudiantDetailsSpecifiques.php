<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantDetailsSpecifiques extends Model
{
    use HasFactory;

    protected $table = 'etudiant_details_specifiques';

    protected $fillable = [
        'etudiant_id',
        'origine_ethnique',
        'statut_socio_economique',
        'statut_socio_econimique', // Erreur potentielle ici dans la colonne, à corriger si nécessaire
        'religion',
        'orientation_sexuelle',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
