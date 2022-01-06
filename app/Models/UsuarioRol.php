<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRol extends Model
{
    use HasFactory;
    
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    public function rol(){
        return $this->belongsTo('App\Models\Rol');
    }
}
