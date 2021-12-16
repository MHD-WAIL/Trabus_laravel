<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property string $name
 */
class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $fillable = [
        'number',
    ];

    // public function type(): BelongsTo
    // {
    //     return $this->belongsTo(CardType::class, "card_type_id");
    //     return $this->belongsTo(BlueCard::class, "Blue_card_id");
    //     return $this->belongsTo(ElectronicCard::class, "Electronic_card_id");
    //     return $this->belongsTo(IstanbulCard::class, "Istanbul_card_id");
    // }
    // are you following me ? yep ok
    // first each relation must have 1 function returns one result

    //now I will make relation for blue card
    public function blueCard()
    {
        return $this->belongsTo(BlueCard::class);
        // if you want to define the foreign key by yourself
        // return $this->belongsTo(BlueCard::class,'foreignky_name')
    }

    // now do this relation

    public function istanbulCard()
    {
        return $this->belongsTo(IstanbulCard::class);
        // nice but istanbul Uppercase // ok
        // so let's add the last one ok
    }

    public function electronicCard()
    {
        return $this->belongsTo(ElectronicCard::class);
    }
    // now we need to generate 20 card from each type using factory done
    //so let's test the relation


}
