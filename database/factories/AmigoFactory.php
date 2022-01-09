<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Amigo;
use App\Models\Usuario;

class AmigoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idUsuario1' => Usuario::all()->random()->id,
            'idUsuario2' => Usuario::all()->random()->id,
            'delete' => FALSE
        ];
    }
}
