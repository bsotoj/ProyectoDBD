<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListaDeseoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreLista'=>$this->faker->word
        ];
    }
}
