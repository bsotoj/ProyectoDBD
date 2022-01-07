<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Juego;
use App\Models\Usuario;
use App\Models\Like;

class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idJuego'=>Juego::all()->random()->id,
            'idUsuario'=>Usuario:all()->random()->id
        ];
    }
}
