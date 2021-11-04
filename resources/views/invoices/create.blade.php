@extends('layouts.app')
@section('content')

<div class="container row col">
<div class="col-sm-2">
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
            <div class="modal-content container-fluid shadow-lg border-0" style="height: 90vh">  
                <h5>Modal para info de Productos</h5>          
            </div>
        </div>
    </div>
    <div class="modal fade" 
     id="modalCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content container-fluid shadow-lg border-0" style="height: 90vh">            
                <h5>Modal para info de Clientes</h5>
            </div>
        </div>
    </div>
    <div class="modal fade" 
     id="modalFactura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content container-fluid shadow-lg border-0" style="height: 90vh">            
                <h5>Modal para info de Facturas</h5>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center col-sm-8">
    <div class="col bg-white shadow p-4">                    
        <div class="col-12 border-bottom mb-1">
            <h2>Orden Número: {{$invoice->n_invoice}}</h2>
            <small>Creada el día: {{$invoice->created_at}}</small>
        </div>  
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
            <form action="{{route('orders.store')}}" method="post" class="col-12 row align-items-end">
                @csrf
                <div class="form-group">                        
                    <input type="hidden" class="form-control"
                     name="invoice_id" id="invoice_id" value="{{$invoice->id}}">
                </div>
                <div class="form-group col-8" class=" p-1">                        
                <input type="text"
                    class="form-control" name="product_id" id="product_id" 
                    aria-describedby="helpId" 
                    placeholder="Referencia del producto">                        
                </div>
                <div class="form-group col-2" class=" p-1">                            
                    <input type="number"
                    class="form-control" name="cnt" id="cnt" 
                    aria-describedby="helpId" 
                    placeholder="Cantidades del producto"
                    value="1"
                    min="1"
                    >                        
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-light bg-white shadow-sm border-info">Agregar</button>                      
                </div>                      
            </form>                              
        </div>
        @if ($order_invoices)
        <div class="col-12  table-responsive">
            <table class="table table-bordered border-primary bg-white">
                <thead class="thead-inverse">
                <tr>
                    <th>Referencia</th>
                    <th>Name</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($order_invoices as $item)                             
                    <tr>
                        <td scope="row"> {{$item->product_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->cnt}}</td>
                        <td>${{$item->total}} U.S</td>
                    </tr>
                    @endforeach                             
                </tbody>
            </table>                
        </div> 
        <div class="col-12 mt-2">
            <ul class="list-group">
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
                        ${{$totals}} U.S                                                                                               
                    </span>
                </li>                                                         
            </ul>
        </div>
        <div class="justify-content-end row mt-2">
            <form action="{{route('orders.update',['order'=>$invoice->id])}}" method="post">
                
                @csrf 
                @method('PUT')                                
                <input type="hidden"
                    class="form-control" name="status" id="status" value="Pagada">                                                                  
                <input type="hidden"
                    class="form-control" name="total" id="total" value="{{$totals}}">                                                                  
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