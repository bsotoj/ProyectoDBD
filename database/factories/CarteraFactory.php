<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cartera;

class CarteraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'metodoRecarga' => $this->faker->creditCardType,
            'tipoMoneda' => $this->faker->randomElement($array = array ('CL','USD','JPY')),
            'monto' => $this->faker->numberBetween($min = 1, $max = 999999)
        ];
    }
}
