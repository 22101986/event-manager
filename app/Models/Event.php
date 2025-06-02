<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{   
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'place_id', 
        'poster',  
    ];
    // L'organisateur
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Lieu de l'événement
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }

    // Les participants
    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    // Les intervenants
    public function speakers(): HasMany
    {
        return $this->hasMany(Speaker::class);
    }

    // Les sponsors
    public function sponsors(): HasMany
    {
        return $this->hasMany(Sponsor::class);
    }
}