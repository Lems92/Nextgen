<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametrage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'table',
        'sigle',
        'libelle',
        'description'
    ];

    public static function getDescriptionsByTable($tableName)
    {
        return self::where('table', $tableName)->pluck('description', 'sigle')->toArray();
    }
}
