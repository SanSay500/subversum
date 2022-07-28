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
