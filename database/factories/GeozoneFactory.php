<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GeozoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dirección' =>$this->faker->address,
            'nombre_país' =>$this->faker->randomElement(['Chile','Brasil','Colombia']),
        ];
    }
}
