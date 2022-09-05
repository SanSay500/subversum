<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'total_count'];
    public $timestamps = false;


    public function resources_map()
    {
        return $this->belongsTo(ResourceMap::class);
    }

}
