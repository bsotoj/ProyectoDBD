<?php

namespace Database\Factories;
use App\Models\WishList;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = WishList::class;
    public function definition()
    {
        return [
            'nombre_lista'=>$this->faker->word($maxNbChars = 50, $minNbChars = 6),
            //word($maxNbChars = 50, $minNbChars = 6),
            
        ];
    }
}
