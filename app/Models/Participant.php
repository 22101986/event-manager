<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participant extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'status', // 'pending', 'confirmed', 'cancelled'
    ];
    // Chaque participant est lié à un utilisateur
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Chaque participant est lié à un événement
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}