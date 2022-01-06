<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaDeseo extends Model
{
    use HasFactory;

    public function usuario(){
        return $this->hasOne('App\Models\Usuario');
    }

    public function lista_deseos_juegos(){
        return $this->hasMany('App\Models\ListaDeseosJuegos');
    }
}
