<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name'=>$this->faker->sentence(3),
        'email'=>$this->faker->unique()->safeEmail(),
        'type_id'=>$this->faker->numberBetween(1,4),        
        'id_legal'=>$this->faker->unique()->numberBetween(9000000,9999999),
        'direction'=>$this->faker->sentence(1),
        ];
    }
}
