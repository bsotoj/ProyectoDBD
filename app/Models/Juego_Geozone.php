<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego_Geozone extends Model
{
    use HasFactory;

    public function game()
    {
    return $this->belongsTo('App\Models\Game');
    }

    public function geozone()
    {
    return $this->belongsTo('App\Models\GeoZone');
    }
}