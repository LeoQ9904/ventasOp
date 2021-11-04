<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Listado de ordenes';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $orden= Invoice::latest()->first();        
        if(!$orden){
            $orden = Invoice::create([                
            ]);
        }else{
            if($orden->status==1){
                $orden = Order::create([
                    
                ]);
            }   
        }
        $order_invoices=
        DB::select(
        "SELECT order_id,product_id,name,cnt,total 
         FROM ventasop.invoices,ventasop.products 
         where ventasop.invoices.product_id=ventasop.products.id 
            and ventasop.invoices.order_id={$orden->id};");                            
        return view('order.create')->with(
            ['orden'=>$orden,'order_invoices'=>$order_invoices]
        );
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
        Order::create([
            'invoice_id'=>request()->invoice_id,            
            'product_id'=>request()->product_id,
            'cnt'=>request()->cnt,
            'total'=>$total
        ]); 
        return redirect()->route('invoices.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Order $product)
    {
        //detalles del producto
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $product)
    {
        return 'formulario para la edición del producto';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $product
     * @return \Illuminate\Http\Response
     */
    public function update($orden)
    {   
        $orden = Invoice::findOrFail($orden);        
        $orden->update([
            'status'=>request()->status,
            'total'=>request()->total
        ]);
        return redirect()->route('invoices.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $product)
    {
        //loguica que se encarga de eliminar el producto
    }
}
