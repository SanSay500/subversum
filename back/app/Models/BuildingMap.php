<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingMap extends Model
{
    use HasFactory;
    protected $fillable=['building_id', 'level', 'plot_id', 'volume', 'storage', 'speed'];
    public $timestamps = false;
    protected $table = "buildings_map";

    public function regions()
    {
        return $this->belongsTo(Region::class);
    }

    public function building()
    {
        return $this->hasOne(Building::class,'building_id','id');
    }
}
