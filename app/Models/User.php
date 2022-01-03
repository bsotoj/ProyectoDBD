<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
}
