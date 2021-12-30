<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    public function subject()
    {
    return $this->belongsTo('App\Models\Subject');
    }

    public function course()
    {
    return $this->belongsTo(Course::class);
    }
    
}
