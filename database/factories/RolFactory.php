<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_rol' =>$this->faker->name,
            'función' =>$this->faker->randomElement(['Administrador','Desarrollador','Cliente']),
        ];
    }
}
