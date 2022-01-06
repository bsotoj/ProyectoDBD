<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaJuego extends Model
{
    use HasFactory;

    public function juego(){
        return $this->belongsTo('App\Models\Juego');
    }

    public function venta(){
        return $this->belongsTo('App\Models\Venta');
    }

}
