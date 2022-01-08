<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Juego;
use App\Models\Usuario;
use App\Models\Biblioteca;

class BibliotecaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idUsuario' => Usuario::all()->random()->id,
            'idJuego' => Juego::all()->random()->id,
        ];
    }
}
