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
        //el siguiente if es para cuando no se tiene ninguna factura creada
        if(is_null($numFc)){
            Invoice::create(['n_invoice' => 1]);
            $numFc=Invoice::orderby('n_invoice','DESC')->first();  //toma de ultima factura creada
        }
        if($numFc->status!='Pendiente'){
                //creacion de factura tomando la ultima factura e incrementandola a 1
                Invoice::create(['n_invoice' => $numFc->n_invoice+1]);
        }
        $invoice=Invoice::orderby('n_invoice','DESC')->first();
        $customer=Customer::find($invoice->customer_id);
        $order_invoices=
        DB::select(
        "SELECT ventasop.products.id as product_id,
        ventasop.products.name as name,
        ventasop.products.price as price,
        ventasop.orders.cnt as cnt,
        ventasop.orders.total as total,
        ventasop.orders.total_descu as total_descu,
        ventasop.orders.descu as descu
        FROM ventasop.orders,ventasop.products
        where ventasop.orders.product_id=ventasop.products.id
        and ventasop.orders.invoice_id=$invoice->id;
        ");
        return view('invoices.create')->with([
            'invoice'=>$invoice,
            'order_invoices'=>$order_invoices,
            'customer'=>$customer,
            'customers'=>Customer::all(),
            'products'=>Product::all(),
            'invoices'=>Invoice::all()
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
        $id_customer=Customer::firstWhere('id_legal',request()->id_legal);
        $invoice->update([
            'customer_id'=>$id_customer->id,
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
