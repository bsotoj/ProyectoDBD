<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function user()
    {
    return $this->belongsTo('App\Models\Usuario');
    }

    public function venta_juego()
    {
    return $this->hasMany('App\Models\Venta_Juego');
    }
}
