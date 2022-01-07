<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
use App\Models\Cartera;
use App\Models\Region;
use App\Models\ListaDeseo;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreUsuario'=>$this->faker->userName,
            'nombre'=>$this->faker->name,
            'email'=>$this->faker->email,
            'contraseña'=>$this->faker->password,
            'fechaNacimiento'=>$this->faker->date,
            'idCartera'=>Cartera::all()->random()->id,
            'idRegion'=>Region::all()->random()->id,
            'idListaDeseos'=>ListaDeseos::all()->random()->id
        ];
    }
}
