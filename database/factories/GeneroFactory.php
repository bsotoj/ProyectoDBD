<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genero;

class GeneroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreGenero' => $this->faker->randomElement($array = array ('Aventura','Casual','Estrategia')),
            'delete' => FALSE
        ];
    }
}
