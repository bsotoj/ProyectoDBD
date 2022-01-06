<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rol extends Model
{
    use HasFactory;
    
    public function rol_usuario()
    {
    return $this->hasMany('App\Models\Rol_Usuario');
    }

    public function rol_juego()
    {
    return $this->hasMany('App\Models\Rol_Juego');
    }
}
