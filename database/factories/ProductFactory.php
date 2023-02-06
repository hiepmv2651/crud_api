<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'detail' => $this->faker->sentence(20),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'image' => \Arr::random([
               'logos/BanhCuonNhoMieng.jpg',
               'logos/BanhCuonSocola.jpg',
               'logos/BanhDeoHatSen.jpg',
               'logos/BanhNuongDauXanh.jpg',
               'logos/BanhQuyHatDeCuoi.jpg',
               'logos/BanhQuyHatMacCa.jpg',
               'logos/BlueOcean.jpg',
               'logos/Chiffon3Vi.jpg',
               'logos/ChiffonVani.jpg',
               'logos/ChocolateFruit.jpg',
               'logos/LadyFinger.jpg',
               'logos/MiPaTe.jpg',
               'logos/MiThapCam.jpg'
            ]),
            'quantity' => $this->faker->randomNumber,
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}