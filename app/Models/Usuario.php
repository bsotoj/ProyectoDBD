<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    public function wallet()
    {
    return $this->belongsTo(Wallet::class);
    }

    public function geozone()
    {
    return $this->belongsTo('App\Models\Geozone');
    }

    public function rol_usuario()
    {
    return $this->hasMany('App\Models\Rol_Usuario');
    }

    public function post()
    {
    return $this->hasMany('App\Models\Post');
    }

    public function usuario_comunidad()
    {
    return $this->hasMany('App\Models\Usuario_Comunidad');
    }

    public function reaction()
    {
    return $this->hasOne('App\Models\Reaction'); 
    }

    public function sale()
    {
    return $this->hasMany('App\Models\Sale');
    }

    public function wishlist()
    {
    return $this->belongsTo(WishList::class);
    }

    public function usuario_juego()
    {
    return $this->hasMany('App\Models\Usuario_Juego');
    }
}
