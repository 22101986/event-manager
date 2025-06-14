<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Un utilisateur peut organiser plusieurs événements
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    // Un utilisateur peut être participant à plusieurs événements (via la table participants)
    public function participations(): HasMany
    {
        return $this->hasMany(Participant::class);
    }
}