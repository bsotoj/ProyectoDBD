<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Publicacion;
use App\Models\Comunidad;
use App\Models\Usuario;

class PublicacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombrePublicacion' => $this->faker->word,
            'mensajePublicacion' => $this->faker->text,
            'idComunidad' => Comunidad::all()->random()->id,
            'idUsuario'=> Usuario::all()->random()->id,

        ];
    }
}
