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
        Product::factory(40)->create();
        Customer::factory(20)->create();
        seller::factory(4)->create();
        company::factory()->create();
        $cantidadInvoices=40;//cantidad de facturas que se desee crear. 
        $i=0;
        while($i<$cantidadInvoices){
            $invoice = Invoice::factory()->create();
            $cntp= random_int(1,15);//cantidad de productos agregados aleatoriamenteauna factura
            $e=0;
            while($e<$cntp){
                Order::factory()->neworder($invoice->id)->create();
                $e=$e+1;
            } 
           
            $invoiceProducts=$invoice->productos;
            $total_g=$invoiceProducts->sum('total');
            $total_iva=$total_g*19/100;
            $total_descu=$invoiceProducts->sum('total_descu');
            $invoice->update([                
                'total_iva'=>$total_iva,
                'total_dec'=>$total_descu,
                'total'=>$total_g,                
            ]);
            $i=$i+1;
        }
    }
}
