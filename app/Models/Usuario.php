<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public function cartera(){
        return $this->belongsTo('App\Models\Cartera');
    }

    public function region(){
        return $this->belongsTo('App\Models\Region');
    }
    public function lista_deseos(){
        return $this->belongsTo('App\Models\ListaDeseos');
    }

    public function biblioteca(){
        return $this->hasMany('App\Models\Biblioteca');
    }

    public function like(){
        return $this->hasMany('App\Models\Like');
    }

    public function usuario_rol(){
        return $this->hasMany('App\Models\UsuarioRol');
    }

    public function venta(){
        return $this->hasMany('App\Models\Venta');
    }

    public function comentario(){
        return $this->hasMany('App\Models\Comentario');
    }

    public function comunidad_usuario(){
        return $this->hasMany('App\Models\ComunidadUsuario');
    }
    
    public function publicacion(){
        return $this->hasMany('App\Models\Publicacion');
    }

    public function amigo1(){
        return $this->hasMany('App\Models\Amigo');
    }
    public function amigo2(){
        return $this->hasMany('App\Models\Amigo');
    }



    


}
