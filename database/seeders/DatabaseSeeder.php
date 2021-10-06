<?php

namespace Database\Seeders;

use App\Models\company;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\seller;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(20)->create();
        Customer::factory(60)->create();
        seller::factory(3)->create();
        company::factory()->create();
        $cantidadInvoices=20;//cantidad de facturas que se desee crear. 
        $i=0;
        while($i<$cantidadInvoices){
            $invoice = Invoice::factory()->create();
            $cntp= random_int(1,10);//cantidad de productos agregados aleatoriamenteauna factura
            $e=0;
            while($e<$cntp){
                Order::factory()->neworder($invoice->id)->create();
                $e=$e+1;
            } 
            $i=$i+1;
        }
    }
}
