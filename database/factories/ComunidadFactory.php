<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Juego;
use App\Models\Comunidad;

class ComunidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idJuego'=>Juego:all()->random()->id,
            'nombreComunidad'=>$this->faker->company
        ];
    }
}
