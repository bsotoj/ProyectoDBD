<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geozone extends Model
{
    use HasFactory;

    public function user()
    {
    return $this->hasMany('App\Models\Usuario');
    }

    public function juego_geozone()
    {
    return $this->hasMany('App\Models\Juego_Geozone');
    }
}
