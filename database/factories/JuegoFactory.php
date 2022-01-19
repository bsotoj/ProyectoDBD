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
            'edadRestriccion'=>$this->faker->numberBetween($min = 12, $max = 18),
            'almacenamiento'=>$this->faker->numberBetween($min = 1, $max = 100),
            'linkJuego'=>$this->faker->url,
            'delete' =>false
        ];
    }
}
