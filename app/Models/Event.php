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

    public function universite()
    {
        return $this->belongsTo(Universite::class);
    }
}
