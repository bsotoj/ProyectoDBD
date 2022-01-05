<?php

namespace Database\Factories;
use App\Models\Geozone;
use App\Models\Usuario;
use App\Models\Wallet;
use App\Models\WishList;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Usuario::class;
    public function definition()
    {
        return [
            'nombre_usuario' =>$this->faker->name,
            'edad' =>$this->faker->numberBetween($min=15,$max=60),
            'password'=>$this->faker->password,
            'id_cartera'=>Wallet::all()->random()->id,
            'id_lista_deseo' =>WishList::all()->random()->id,
            'código_postal' =>Geozone::all()->random()->id,
        ];
    }
}
