<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Juego;
use App\Models\Genero;


class JuegoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idGenero'=>Genero::all()->random()->id,
            'nombreJuego'=>$this->faker->name,
            'edadRestriccion'=>$this->faker->numberBetwen($min = 12, $max = 18),
            'almacenamiento'=>$this->faker->randomElement($array = array('Nube','Local')),
            'linkJuego'=>$this->faker->url
        ];
    }
}
