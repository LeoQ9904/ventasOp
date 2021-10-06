<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) { 
            $table->id();
            $table->string('n_invoice')->unique();
            $table->BigInteger('customer_id')->unsigned(); 
            $table->BigInteger('seller_id')->unsigned();            
            $table->BigInteger('company_id')->unsigned();            
            $table->string('status');
            $table->float('total_iva')->unsigned();
            $table->float('total_dec')->unsigned();            
            $table->float('total')->unsigned();  
            
            
            $table->foreign('customer_id')->references('id')->on('customers');            
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('company_id')->references('id')->on('companies');
            
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
        Schema::dropIfExists('invoices');
    }
}
