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