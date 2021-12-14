@extends('layouts.app')
@section('content')

<div class="container row col">
<div class="col-sm-2">
    <!--Botone para el lanzamiento de models-->
    <div type="button" data-toggle="modal" data-target="#modalProduct" 
        class="cartaboton mb-4 shadow-sm align-content-center justify-content-center row">
        <h5 class="">Listado de productos</h5>
    </div>    
    <div type="button" data-toggle="modal" data-target="#modalCliente"
        class="cartaboton mb-4 shadow-sm align-content-center justify-content-center row">
        <h5>Listado de Clientes</h5>
    </div>
    <div type="button" data-toggle="modal" data-target="#modalFactura" 
        class="cartaboton shadow-sm align-content-center justify-content-center row">
        <h5>Listado de Facturas</h5>
    </div>

    <!-- Modals para mostrar la infomación de productos, clientes y facturas -->
    <div class="modal fade" 
     id="modalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content container-fluid shadow-lg border-0 p-3">  
                <div class="">
                    <h2>Crear nuevo producto</h2>
                    <form action="{{route('products.store')}}" method="post" class="col-12 row align-items-end">
                        @csrf                        
                        <div class="form-group col">                        
                        <input type="text"
                            class="form-control" name="name" id="name" 
                            aria-describedby="helpId" 
                            placeholder="customer name" required>                        
                        </div>
                        <div class="form-group col">                            
                            <input type="text"
                            class="form-control" name="reference" id="reference" 
                            aria-describedby="helpId" 
                            placeholder="product reference"                            
                            required>                        
                        </div>                    
                        <div class="form-group col">                      
                        <input type="number"
                            class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="product price" min="0.00" max="10000000.00" step="0.01">                      
                        </div>
                        <div class="form-group col">                      
                            <select class="form-control" name="category" id="category">
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                                <option value="3">Category 3</option>
                                <option value="4">Category 4</option>
                            </select>
                        </div>                        
                        <div class="form-group col-12">                      
                        <input type="text"
                            class="form-control" name="descript" id="descript" aria-describedby="helpId" 
                            placeholder="product descript">                      
                        </div>                        
                        <div class="form-group justify-content-end row col">
                            <button type="submit" class="btn btn-light bg-white shadow-sm border-info">Agregar</button>                      
                        </div>                      
                    </form>  
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered border-primary bg-white">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Referencia</th>
                            <th>Nombre</th>                        
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Iva</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)                             
                            <tr>
                                <td scope="row"> {{$product->reference}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->descript}}</td>
                                <td>$ {{number_format($product->price,2)}} C.O</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->iva}}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                          </svg>
                                    </button>
                                    <button type="button" class="btn">                                                                          
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach                             
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" 
     id="modalCliente" tabindex="-1" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content container-fluid shadow-lg border-0 p-3">                            
                <div class="">
                    <h2>Crear Nuevo cliente</h2>
                    <form action="{{route('customers.store')}}" method="post" class="col-12 row align-items-end">
                        @csrf                        
                        <div class="form-group col">                        
                        <input type="text"
                            class="form-control" name="name" id="name" 
                            aria-describedby="helpId" 
                            placeholder="customer name" required>                        
                        </div>
                        <div class="form-group col">                            
                            <input type="email"
                            class="form-control" name="email" id="email" 
                            aria-describedby="helpId" 
                            placeholder="customer email"                            
                            required>                        
                        </div>
                        <div class="form-group col">                      
                        <select class="form-control" name="type_id" id="">
                            <option value="1">Cedula Colombina</option>
                            <option value="2">Tarjeta de Identidad</option>
                            <option value="3">Pasaporte</option>
                            <option value="4">Cedula extranjera</option>
                        </select>
                        </div>
                        <div class="form-group col">                      
                        <input type="number"
                            class="form-control" name="id_legal" id="id_legal" aria-describedby="helpId" placeholder="número de documento">                      
                        </div>
                        <div class="form-group col-12">                      
                        <input type="text"
                            class="form-control" name="direction" id="" aria-describedby="helpId" 
                            placeholder="Ingresar Direción detallada, junto con ciudad y departamento">                      
                        </div>
                        <div class="form-group justify-content-end row col">
                            <button type="submit" class="btn btn-light bg-white shadow-sm ">Agregar</button>                      
                        </div>                      
                    </form>  
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered border-primary bg-white">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>                        
                            <th>Documento</th>
                            <th>Direccion</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $item)                             
                            <tr>
                                <td scope="row"> {{$item->name}}</td>
                                <td>{{$item->email}}</td>                            
                                <td>{{$item->id_legal}}</td>
                                <td>{{$item->direction}}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                          </svg>
                                    </button>
                                    <button type="button" class="btn">                                                                          
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach                             
                        </tbody>
                    </table>  
                </div>
           </div>
        </div>
    </div>
    <div class="modal fade" 
     id="modalFactura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content container-fluid shadow-lg border-0 p-3">                            
            <div class="">
                <h2>Información de Facturación</h2>
                <!--Modificar el formulario para hacer consulta de facturas con numero o cedula-->
                <form action="{{route('customers.store')}}" method="post" class="col-12 row align-items-end">
                    @csrf                                            
                    <div class="form-group col-12">                      
                    <input type="text"
                        class="form-control" name="direction" id="" aria-describedby="helpId" 
                        placeholder="Ingresar número de factura o documento a quien se le facturó">                      
                    </div>
                    <div class="form-group justify-content-end row col">
                        <button type="submit" class="btn btn-light bg-white shadow-sm border-info">Consultar</button>                      
                    </div>                      
                </form>  
            </div>
            <div class="table-responsive">
                <table class="table table-bordered border-primary bg-white table-hover">
                    <thead class="thead-inverse">
                    <tr>
                        <th>Factura #</th>
                        <th>Cliente</th> 
                        <th>Document C</th>                       
                        <th>Estado</th>
                        <th>Total Iva</th>
                        <th>Total desc</th>
                        <th>Total pagado</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)                             
                        <tr data-toggle="collapse" data-target="#id{{$invoice->id}}" class="clickable">
                            <td scope="row"> {{$invoice->n_invoice}}</td>
                            @if (is_null($invoice->customer_id))
                            <td>sin cliente</td>   
                            <td>sin cliente</td> 
                            @else
                            <td>{{$invoices->find($invoice->id)->customer->name}}</td>
                            <td>{{$invoices->find($invoice->id)->customer->id_legal}}</td>
                            @endif                            
                            <td>{{$invoice->status}}</td>
                            <td>$ {{number_format($invoice->total_iva,2)}} C.O</td>
                            <td>$ {{number_format($invoice->total_dec,2)}} C.O</td>
                            <td>$ {{number_format($invoice->total,2)}} C.O</td>
                        </tr>
                        <!--se filtra info de cada factura en este collapse-->
                        <tr  >
                            <td colspan="7" class="p-0" >
                                <div id="id{{$invoice->id}}" class="collapse p-0">
                                    <table class="table table-borderless">
                                        <thead class="thead-inverse">
                                        <tr>
                                            <th>Referencia</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Descuento %</th>
                                            <th>Valor Producto</th>
                                            <th>Total Descuento</th>
                                            <th>Total Producto</th>
                                        </tr>
                                        </thead>
                                        <tbody>   
                                            @foreach (App\Models\Order::where('invoice_id',$invoice->id)->get() as $orden)
                                            <tr>
                                                <td scope="row">{{App\Models\Order::find($orden->id)->producto->id}}</td>
                                                <td>{{App\Models\Order::find($orden->id)->producto->name}}</td>
                                                <td>{{$orden->cnt}}</td>
                                                <td>{{$orden->descu}}</td>
                                                <td>{{number_format(App\Models\Order::find($orden->id)->producto->price,2)}}</td>
                                                <td>{{number_format($orden->total_descu,2)}}</td>
                                                <td>{{number_format($orden->total,2)}}</td>
                                            </tr>
                                            @endforeach                                                                                                                                                                                           
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        @endforeach                                                 
                    </tbody>
                </table>  
            </div>                 
       </div>
    </div>

    </div>
</div>
<div class="row justify-content-center col-sm-8">
    <div class="col bg-white shadow p-4">                    
        <!--Información sobre facturación-->
        <div class="col-12 border-bottom mb-1">
            <h2>Orden Número: {{$invoice->n_invoice}}</h2>
            <small>Creada el día: {{$invoice->created_at}}</small>
        </div>  

        <!--Formulario para laasignación de cliente a factura-->
        <div class="col-12 p-1 border-bottom mb-1 text-right">
            @if (!$invoice->customer_id)
            <h5>Añadir cliente</h5>
            <form action="{{route('invoices.update',['invoice'=>$invoice->id])}}" method="post" class="col-12 row align-items-end">
                @csrf            
                @method('PUT')                                                                       
                <div class="form-group col mr-1">                      
                  <input type="number"
                    class="form-control" name="id_legal" id="id_legal" 
                    aria-describedby="helpId" placeholder="número de documento o nit de empresa">                      
                </div>                    
                <div class="form-group justify-content-end row">
                    <button type="submit" class="btn btn-light bg-white shadow-sm border-info">Agregar</button>                      
                </div>                      
            </form>
            @else
            <h4 class="m-3"><small>Cliente: </small> {{$customer->name}}</h4>
            @endif 

        </div>  

        <div class="col-12 pt-3">           
        <!--Formulario para la asignación de productos a facturas-->
            <form action="{{route('orders.store')}}" method="post" class="col-12 row align-items-end">
                @csrf
                <div class="form-group">                        
                    <input type="hidden" class="form-control"
                     name="invoice_id" id="invoice_id" value="{{$invoice->id}}">
                </div>
                <div class="form-group col-6" class=" p-1">                        
                <input type="text"
                    class="form-control" name="product_reference" id="product_reference" 
                    aria-describedby="helpId" 
                    placeholder="Referencia del producto">                        
                </div>
                <div class="form-group col-2" class=" p-1">                            
                    <input type="number"
                    class="form-control" name="cnt" id="cnt" 
                    aria-describedby="helpId" 
                    placeholder="Cantidades del producto"
                    value="1.0"
                    min="0.01"
                    step="0.01"
                    >                        
                </div>
                <div class="form-group col-2" class=" p-1">                  
                  <input type="number" name="dec" id="dec" 
                  class="form-control" placeholder="" aria-describedby="descuento en %"
                  value="0"
                  min="0">                  
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-light bg-white shadow-sm border-info">Agregar</button>                      
                </div>                      
            </form>                              
        </div>

        <!--Tabla muestra productos asignados a la factura-->
        @if ($order_invoices)
        <div class="col-12  table-responsive">
            <table class="table table-bordered border-primary bg-white">
                <thead class="thead-inverse">
                <tr>
                    <th>Referencia</th>
                    <th>Name</th>
                    <th>Cantidad</th>
                    <th>Descuento %</th>
                    <th>Valor Producto</th>
                    <th>Total Descuento</th>
                    <th>Total Producto</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($order_invoices as $item)                             
                    <tr>
                        <td scope="row"> {{$item->product_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->cnt}}</td>
                        <td>{{$item->descu}}</td>
                        <td>${{number_format($item->price,2)}}</td>
                        <td>${{number_format($item->total_descu,2)}}</td>
                        <td>${{number_format($item->total,2)}}</td>
                    </tr>
                    @endforeach                             
                </tbody>
            </table>                
        </div> 
        <!--Totales para pagar sobre facturación-->
        <div class="col-12 mt-2">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total de descuento: 
                    @php
                        $totals_desc=0;                            
                    @endphp
                    @foreach ($order_invoices as $item)
                        @php                                
                        $totals_desc+=$item->total_descu;
                        @endphp
                    @endforeach 
                    <span class="">
                        ${{number_format($totals_desc,2)}} C.O                                                                                               
                    </span>
                </li> 
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total a pagar de la factura: 
                    @php
                        $totals=0;                            
                    @endphp
                    @foreach ($order_invoices as $item)
                        @php                                
                        $totals+=$item->total;
                        @endphp
                    @endforeach 
                    <span class="">
                        ${{number_format($totals,2)}} C.O                                                                                               
                    </span>
                </li>                                                         
            </ul>
        </div>
        <!--Formulario para cerrar facturación-->
        <div class="justify-content-end row mt-2">
            <form action="{{route('orders.update',['order'=>$invoice->id])}}" method="post">                
                @csrf 
                @method('PUT')                                
                <input type="hidden"
                    class="form-control" name="status" id="status" value="Pagada">                                                                  
                <input type="hidden"
                    class="form-control" name="total" id="total" value="{{$totals}}">                                                                  
                <input type="hidden"
                    class="form-control" name="total_dec" id="total_dec" value="{{$totals_desc}}">                                                                  
                <button type="submit" 
                class="btn btn-light bg-white shadow-sm border-info">Cerrar Orden</button>
            </form>
        </div> 
        @endif                 
    </div>            
</div> 
<div class="col-sm-2">

</div>    
</div>

@endsection