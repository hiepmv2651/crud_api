<?php

namespace Database\Factories;

use App\Models\Cart;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->randomNumber,
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'product_id' => \App\Models\Product::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
