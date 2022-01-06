<?php

namespace Database\Factories;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Rol_Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class Rol_UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Rol_Usuario::class;
    public function definition()
    {
        return [
            'id_rol' =>Rol::all()->random()->id,
            'id_usuario' =>Usuario::all()->random()->id,
        ];
    }
}
