<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_Juego extends Model
{
    use HasFactory;

    public function game()
    {
    return $this->belongsTo('App\Models\Game');
    }

    public function rol()
    {
    return $this->belongsTo('App\Models\Rol');
    }
}