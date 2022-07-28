<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = ['type'];
    public $timestamps = false;

    public function resources_map()
    {
        return $this->belongsTo(ResourceMap::class);
    }

}
