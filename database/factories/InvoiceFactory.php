<?php

namespace Database\Factories;

use App\Models\company;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {         
        return [
            'n_invoice'=>$this->faker->unique()->numberBetween(100,9999),                        
            'customer_id'=>Customer::all()->random()->id,
            'seller_id'=>seller::all()->random()->id,
            'company_id'=>company::all()->random()->id,
            'status'=>$this->faker->randomElement(['Pagada','Pendiente','Cancelada']),
            'total_iva'=>0,
            'total_dec'=>0,
            'total'=>0,
        ];
    }
    public function cambioestado($estado,$total){
        return $this->state(
            [
            'n_invoice'=>$this->faker->unique()->numberBetween(100,9999),                        
            'customer_id'=>Customer::all()->random()->id,
            'seller_id'=>seller::all()->random()->id,
            'company_id'=>company::all()->random()->id,
            'status'=>$this->faker->randomElement(['Pagada','Pendiente','Cancelada']),
            'total_iva'=>0,
            'total_dec'=>0,
            'total'=>0,
            ]
            );
    }
}
