<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego_Reaccion extends Model
{
    use HasFactory;

    public function game()
    {
    return $this->belongsTo('App\Models\Game');
    }

    public function reaction()
    {
    return $this->belongsTo('App\Models\Reaction');
    }
}