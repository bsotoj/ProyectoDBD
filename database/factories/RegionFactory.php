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
            'nombreRegion' => $this->faker->state,
            'idPais' => Pais::all()->random()->id,
            'delete' => FALSE
        ];
    }
}
