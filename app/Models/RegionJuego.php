<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionJuego extends Model
{
    use HasFactory;

    public function juego(){
        return $this->hasOne('App\Models\Juego');
    }
}
