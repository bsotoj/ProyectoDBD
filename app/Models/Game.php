<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
}

class Game extends Model{
    public function rolJuego()
    {
    return $this->hasMany(‘App\Models\Rol_Juego’);
    }
}

class Game extends Model{
    public function wishList()
    {
    return $this->hasMany(‘App\Models\Wishlist’);
    }
}

class Game extends Model{
    public function community()
    {
    return $this->hasOne(Community::class);
    }
}

class Game extends Model{
    public function achievement()
    {
    return $this->hasMany(‘App\Models\Achievement’);
    }
}

class Game extends Model{
    public function ranking()
    {
    return $this->belongsTo('App\Models\Ranking');
    }
}

class Game extends Model{
    public function juegoGeozone()
    {
    return $this->hasMany(‘App\Models\Juego_Geozone);
    }
}

class Game extends Model{
    public function ventaJuego()
    {
    return $this->hasMany(‘App\Models\Venta_Juego’);
    }
}

class Game extends Model{
    public function juegoReaccion()
    {
    return $this->hasMany(‘App\Models\Juego_Reaccion’);
    }
}