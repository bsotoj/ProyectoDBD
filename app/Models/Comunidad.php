<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    use HasFactory;

    public function juego(){
        return $this->belongsTo('App\Models\Juego');
    }

    public function comunidad_usuario(){
        return $this->hasMany('App\Models\ComunidadUsuario');
    }

    public function publicacion(){
        return $this->hasOne('App\Models\Publicacion');
    }
}
