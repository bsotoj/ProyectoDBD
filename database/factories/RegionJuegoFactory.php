<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RegionJuego;
use App\Models\Region;
use App\Models\Juego;

class RegionJuegoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->word,
            'precio'=> $this->faker->numberBetween($min = 1, $max = 4000),
            'moneda'=> $this->faker->randomElement($array = array ('CL','USD','JPY')),
            'idRegion'=> Region::all()->random()->id,
            'idJuego'=> Juego::all()->random()->id,
            'delete' => FALSE
        ];
    }
}
