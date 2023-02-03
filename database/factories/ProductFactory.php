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
                'https://raw.githubusercontent.com/hiepmv2651/cake-shop/master/images/logos/BanhCuonNhoMieng.jpg',
                'https://raw.githubusercontent.com/hiepmv2651/cake-shop/master/images/logos/BanhCuonSocola.jpg',
                'https://raw.githubusercontent.com/hiepmv2651/cake-shop/master/images/logos/BanhDeoHatSen.jpg',
                'https://raw.githubusercontent.com/hiepmv2651/cake-shop/master/images/logos/BanhNuongDauXanh.jpg',
                'https://raw.githubusercontent.com/hiepmv2651/cake-shop/master/images/logos/BanhQuyHatDeCuoi.jpg',
                'https://raw.githubusercontent.com/hiepmv2651/cake-shop/master/images/logos/BanhQuyHatMacCa.jpg',
                'https://raw.githubusercontent.com/hiepmv2651/cake-shop/master/images/logos/BlueOcean.jpg',
                'https://raw.githubusercontent.com/hiepmv2651/cake-shop/master/images/logos/Chiffon3Vi.jpg',
                'https://raw.githubusercontent.com/hiepmv2651/cake-shop/master/images/logos/ChiffonVani.jpg',
                'https://raw.githubusercontent.com/hiepmv2651/cake-shop/master/images/logos/ChocolateFruit.jpg',
            ]),
            'quantity' => $this->faker->randomNumber,
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
