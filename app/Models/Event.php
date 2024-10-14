<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'universite_id',
        'event_title',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'event_description',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i'
    ];

    public function universite()
    {
        return $this->belongsTo(Universite::class);
    }
}
