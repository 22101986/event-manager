<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends Model
{
    protected $fillable = [
        'name',
        'address',
    ];
    // Un lieu peut accueillir plusieurs événements
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}