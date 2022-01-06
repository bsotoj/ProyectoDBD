<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function juego(){
        return $this->belongsTo('App\Models\Juego');
    }
    
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }
    
}
