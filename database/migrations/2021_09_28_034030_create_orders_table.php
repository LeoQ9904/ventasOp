<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();            
            $table->BigInteger('product_id')->unsigned();
            $table->BigInteger('invoice_id')->unsigned();
            $table->float('total')->unsigned()->default(0);
            $table->float('total_descu')->unsigned()->default(0);
            $table->integer('cnt')->unsigned();
            $table->integer('descu')->unsigned(); 

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
