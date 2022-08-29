<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    protected $fillable =['user_id', 'resource_id', 'res_quantity', 'lot_price', 'lot_status'];
}
