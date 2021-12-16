<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlueCard extends Model
{
    use HasFactory;

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    protected $fillable = [
        'number',
        'card_type',
        'balance',
        'vehicle',
        'customer_type',
        'updated_at',
    ];
}
