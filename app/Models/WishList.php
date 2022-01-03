<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;
}

class WishList extends Model{
    public function game()
    {
    return $this->belongsTo('App\Models\Game');
    }
}