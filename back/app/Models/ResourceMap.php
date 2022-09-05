<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceMap extends Model
{
    use HasFactory;
    protected $fillable=['resource_id','plot_id','total_count'];
    public $timestamps = false;
    protected $table = "resources_map";

    public function regions()
    {
        return $this->belongsTo(Region::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

}
