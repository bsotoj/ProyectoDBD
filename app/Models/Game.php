<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
}

class Subject extends Model{
    public function course()
    {
    return $this->hasMany(‘App\Models\Rol_Juego’);
    }
}

class Subject extends Model{
    public function course()
    {
    return $this->hasMany(‘App\Models\Wishlist’);
    }
}