<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public function usuario(){
        return $this->hasOne('App\Models\Usuario');
    }

    public function venta_juegos(){
        return $this->hasMany('App\Models\VentaJuegos');
    }
}
