<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LogroJuego;
use App\Models\Logro;
use App\Models\Juego;

class LogroJuegoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idLogro'=> Logro::all()->random()->id,
            'idJuego'=> Juego::all()->random()->id,
        ];
    }
}
