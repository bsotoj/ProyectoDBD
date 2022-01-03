<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;
}

class Ranking extends Model{
    public function game()
    {
    return $this->hasMany(‘App\Models\Game’);
    }
}