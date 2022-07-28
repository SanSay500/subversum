<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceMap extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function regions()
    {
        return $this->belongsTo(Region::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

}
