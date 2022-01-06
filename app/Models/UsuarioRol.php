<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRol extends Model
{
    use HasFactory;
    public function usuario_rol(){
        return $this->hasOne('App\Models\UsuarioRol');
    }
}
