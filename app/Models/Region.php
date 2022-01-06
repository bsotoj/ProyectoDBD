<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function pais(){
        return $this->belongsTo('App\Models\Pais');
    }

    public function usuario(){
        return $this->hasMany('App\Models\Usuario');
    }

    public function region_juego(){
        return $this->hasMany('App\Models\RegionJuego');
    }
}
