<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comentario;
use App\Models\Juego;
use App\Models\Usuario;

class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mensaje'=>$this->faker->catchPhrase,
            'idJuego'=>Juego::all()->random()->id,
            'idUsuario'=>Usuario::all()->random->id
        ];
    }
}
