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
            'id'=>Permiso::all()->random()->id,
            'timestamps'=>$this->faker->date,
            'nombreRol'=>$this->faker->randomElement($array = array('Admin','Dev','User'))
        ];
    }
}
