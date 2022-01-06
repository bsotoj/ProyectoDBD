<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_Usuario extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    public function user()
    {
    return $this->belongsTo(Usuario::class);
    }

    public function rol()
    {
    return $this->belongsTo(Rol::class);
    }
}
