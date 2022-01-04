<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function rolJuego()
    {
    return $this->hasMany('App\Models\Rol_Juego');
    }

    public function wishList()
    {
    return $this->hasMany('App\Models\Wishlist');
    }

    public function community()
    {
    return $this->hasOne(Community::class);
    }

    public function achievement()
    {
    return $this->hasMany('App\Models\Achievement');
    }

    public function ranking()
    {
    return $this->belongsTo('App\Models\Ranking');
    }

    public function juegoGeozone()
    {
    return $this->hasMany('App\Models\Juego_Geozone');
    }

    public function ventaJuego()
    {
    return $this->hasMany('App\Models\Venta_Juego');
    }

    public function juegoReaccion()
    {
    return $this->hasMany('App\Models\Juego_Reaccion');
    }
}