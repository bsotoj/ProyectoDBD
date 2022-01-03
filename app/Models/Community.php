<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
}

class Community extends Model{
    public function game()
    {
    return $this->belongsTo(Game::class);
    }
}