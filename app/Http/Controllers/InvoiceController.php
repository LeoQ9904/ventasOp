<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $invoice=0;
        $numFc=Invoice::orderby('n_invoice','DESC')->first();  //toma de ultima factura creada

        if($numFc->status!='pendiente'){
            //creacion de factura tomando la ultima factura e incrementandola a 1           
            $invoice=Invoice::create(['n_invoice' => $numFc->n_invoice+1]);
        }else{
            $invoice=Invoice::where('n_invoice',$numFc->n_invoice)->get();
        }//evitar crear invoices cuando estan pendientes y se pueda reutilizar
        $customer=Customer::where('id',$invoice->customer_id)->get();
        $order_invoices=[];
        return view('invoices.create')->with([
            'invoice'=>$invoice,
            'order_invoices'=>$order_invoices,
            'customer'=>$customer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = Product::find(request()->product_id);
        $total = $producto->price*request()->cnt;
        Invoice::create([
            'order_id'=>request()->order,            
            'product_id'=>request()->product_id,
            'cnt'=>request()->cnt,
            'total'=>$total
        ]); 
        return redirect()->route('orders.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $id_customer=Customer::where('id_legal',request()->id_legal);
        $invoice->update([
            'customer_id'=>$id_customer,
        ]);
        
        return redirect()->route('invoices.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
