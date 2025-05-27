<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sponsor extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'event_id',
    ];
    // Chaque sponsor appartient à un événement
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}