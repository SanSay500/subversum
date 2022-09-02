<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'region_id',
        'longitude',
        'latitude',
        'price',
    ];
    public $timestamps = false;


    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function buildings_map()
    {
        return $this->hasMany(BuildingMap::class);
    }

    public function resources_map()
    {
        return $this->hasMany(ResourceMap::class);
    }

    public function workers_map()
    {
        return $this->hasMany(WorkerMap::class);
    }
}
