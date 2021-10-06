<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productid=Product::all()->random()->id;
        $priceProduct=Product::find($productid);
        $cnt=$this->faker->numberBetween(1,10);
        $total=$priceProduct->price*$cnt;
        $dec=$this->faker->numberBetween(0,90);
        $total_dec=($total*$dec)/100;
        return [
        'product_id'=>$productid,
        'invoice_id'=>Invoice::all()->random()->id,
        'cnt'=>$cnt,
        'total'=>$total,
        'descu'=>$dec,
        'total_descu'=>$total_dec,
        ];
    }
    public function neworder($invoice)
    {
        $productid=Product::all()->random()->id;
        $priceProduct=Product::find($productid);
        $cnt=$this->faker->numberBetween(1,10);
        $total=$priceProduct->price*$cnt;
        $dec=$this->faker->numberBetween(0,50);
        $total_dec=($total*$dec)/100;
        return $this->state([
        'product_id'=>$productid,
        'invoice_id'=>$invoice,
        'cnt'=>$cnt,
        'total'=>$total,
        'descu'=>$dec,
        'total_descu'=>$total_dec,
        ]);
    }
}
