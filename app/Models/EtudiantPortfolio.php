<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantPortfolio extends Model
{
    use HasFactory;

    protected $table = 'etudiant_portfolios';

    protected $fillable = [
        'etudiant_id',
        'lien',
        'description',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
