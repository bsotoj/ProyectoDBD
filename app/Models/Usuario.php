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


}
