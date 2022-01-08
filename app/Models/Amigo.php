<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amigo extends Model
{
    use HasFactory;

    public function usuario1(){
        return $this->belongsTo('App\Models\Usuario');
    }
    public function usuario2(){
        return $this->belongsTo('App\Models\Usuario');
    }
}
