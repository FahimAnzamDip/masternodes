<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalCoin extends Model
{
    use HasFactory;

    protected $fillable = ['coin_name', 'coin_short_name', 'coin_link', 'coin_image'];
}
