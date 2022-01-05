<?php

namespace Database\Factories;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Wallet::class;
    public function definition()
    {
        return [
            'método_recarga'=>$this->faker->randomElement(['Crédito','Débito','Gallinas']),
            'país'=>$this->faker->state,
            'monto'=>$this->faker->numberBetween($min=0,$max=100000),
        ];
    }
}
