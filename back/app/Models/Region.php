<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'continent_id',
        'longitude',
        'latitude',
        ];
    public $timestamps = false;



}
