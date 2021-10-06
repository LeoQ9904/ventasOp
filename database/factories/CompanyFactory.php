<?php

namespace Database\Factories;

use App\Models\company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name'=>'Leo Solution Company',
        'nit'=>1233693218,
        'direction'=>'Bucaramanga DC',
        'email'=>'leosc@leo.com.co',
        'descript'=>'company ejemplo'
        ];
    }
}
