<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Permiso;

class PermisoFactory extends Factory
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
            'nombrePermiso'=>$this->faker->randomElement($array = array('Edit','Upload','Download'))
        ];
    }
}
