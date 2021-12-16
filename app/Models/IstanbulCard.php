<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IstanbulCard extends Model
{
    use HasFactory;
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }
}
