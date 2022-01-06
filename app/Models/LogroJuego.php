<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogroJuego extends Model
{
    use HasFactory;

    public function logro(){
        return $this->belongsTo('App\Models\Logro');
    }

    public function juego(){
        return $this->belongsTo('App\Models\Juego');
    }
}
