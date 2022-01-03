<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;
}

class Course extends Model{
    public function subject()
    {
    return $this->belongsTo('App\Models\Game');
    }
}