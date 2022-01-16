<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pais;
use App\Models\Region;

class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreRegion' => $this->faker->randomElement($array = array('Tarapacá','Antofagasta','Coquimbo','Valparaíso','OHiggins','Maule','Bío Bío','Araucanía','Los lagos','Aysen','Magallanes y Antártica Chilena', 'Metropolitana','Los Ríos','Arica y Parinacota','Ñuble')),
            'idPais' => Pais::all()->random()->id,
            'delete' => FALSE
        ];
    }
}
