<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VentaJuego;
use App\Models\Venta;
use App\Models\Juego;

class VentaJuegoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idVenta'=>Venta::all()->random()->id,
            'idJuego'=>Juego::all()->random()->id
        ];
    }
}
