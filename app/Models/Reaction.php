<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    public function user()
    {
    return $this->belongsTo('App\Models\Usuario');
    }

    public function juego_reaccion()
    {
    return $this->hasMany('App\Models\Juego-Reaccion');
    }

    public function post()
    {
    return $this->belongsTo('App\Models\Post');
    }
}
