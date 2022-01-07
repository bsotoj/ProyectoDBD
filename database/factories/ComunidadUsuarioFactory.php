<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ComunidadUsuario;
use App\Models\Usuario;
use App\Models\Comunidad;

class ComunidadUsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idUsuario'=>Usuario::all()->random()->id,
            'idComunidad'=>Comunidad::all()->random()->id
        ];
    }
}
