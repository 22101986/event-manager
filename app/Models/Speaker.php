<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Speaker extends Model
{
    protected $fillable = [
        'name',
        'bio',
        'event_id',
        'image',

    ];
    // Chaque speaker appartient à un événement
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}