<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
use App\Models\Venta;

class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fechaVenta' => $this->faker->date,
            'monto' => $this->faker->numberBetween($min = 1, $max = 999999),
            'descuento' => $this->faker->numberBetween($min = 1, $max = 1000),
            'idUsuario' => Usuario::all()->random()->id,
        ];
    }
}
