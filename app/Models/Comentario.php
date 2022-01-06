<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    public function juego(){
        return $this->belongsTo('App\Models\Juego');
    }
}
