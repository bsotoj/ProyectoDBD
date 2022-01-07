<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ListaDeseosJuegos;
use App\Models\ListaDeseo;
use App\Models\Juego;

class ListaDeseosJuegosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idListaDeseo'=>ListaDeseo::all()->random()->id,
            'idJuego'=>Juego::all()->random()->id
        ];
    }
}
