<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    public function game()
    {
    return $this->belongsTo(Game::class);
    }

    public function post()
    {
    return $this->hasOne(Post::class);
    }

    public function usuario_comunidad()
    {
    return $this->hasMany('App\Models\Usuario_Comunidad');
    }
}