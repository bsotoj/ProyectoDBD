<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    public function genero(){
        return $this->belongsTo('App\Models\Genero');
    }

    public function biblioteca(){
        return $this->hasMany('App\Models\Biblioteca');
    }

    public function region_juego(){
        return $this->hasMany('App\Models\RegionJuego');
    }

    public function comunidad(){
        return $this->hasOne('App\Models\Comunidad');
    }

    public function like(){
        return $this->hasMany('App\Models\Like');
    }

    public function comentario(){
        return $this->hasMany('App\Models\Comentario');
    }

    public function venta_juego(){
        return $this->hasMany('App\Models\VentaJuego');
    }

    public function logro_juego(){
        return $this->hasMany('App\Models\LogroJuego');
    }

    public function lista_deseos_juegos(){
        return $this->hasMany('App\Models\ListaDeseosJuegos');
    }

    


}
