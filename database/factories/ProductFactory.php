<?php

namespace Database\Factories;

use App\Models\Product;
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
            'name'=>$this->faker->sentence(3),
            'descript'=>$this->faker->sentence(10,20),
            'price'=>$this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
            'reference'=>$this->faker->unique()->numberBetween(0000,9999),
            'category'=>$this->faker->randomElement(['categoria 1','categoria 2','categoria 3','categoria 4']),            
        ];
    }
}
