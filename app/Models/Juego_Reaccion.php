<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego_Reaccion extends Model
{
    use HasFactory;
}

class Juego_Reaccion extends Model{
    public function game()
    {
    return $this->belongsTo('App\Models\Game');
    }
}