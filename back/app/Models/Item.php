<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'for_drone',
        'slot',
        'is_nft',
        'rarity',
        'image',
        'user_id',
        'primary_max_dollars',
        'primary_critical_step_chance',
        'primary_critical_step_force',
        'primary_dollars_per_step',
        'secondary_max_dollars',
        'secondary_critical_step_chance',
        'secondary_critical_step_force',
        'secondary_dollars_per_step',
    ];

    public $timestamps = false;
}
