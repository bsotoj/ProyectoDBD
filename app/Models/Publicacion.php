<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    public function comunidad(){
        return $this->belongsTo('App\Models\Comunidad');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }
}
