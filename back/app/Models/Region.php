<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plot;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plots(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Plot::class);
    }



}
