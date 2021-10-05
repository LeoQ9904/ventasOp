@extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 bg-white shadow p-4">                    
                <div class="col-12">
                    <h2>Orden Número: {{$orden->id}}</h2>
                    <small>Creada el día: {{$orden->created_at}}</small>
                </div>  
                <div class="col-12 p-1 border-bottom mb-3">
                    <form action="{{route('customers.store',['tipo'=>'order','id'=>$orden->id])}}" method="post" class="col-12 row align-items-end">
                        @csrf                        
                        <div class="form-group col" class=" p-1">                        
                        <input type="text"
                            class="form-control" name="name" id="name" 
                            aria-describedby="helpId" 
                            placeholder="customer name" required>                        
                        </div>
                        <div class="form-group col" class=" p-1">                            
                            <input type="email"
                            class="form-control" name="email" id="email" 
                            aria-describedby="helpId" 
                            placeholder="customer email"                            
                            required>                        
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-light bg-white shadow-sm">Agregar</button>                      
                        </div>                      
                    </form>
                </div>         
                <div class="col-12 p-1">
                    <form action="{{route('invoices.store')}}" method="post" class="col-12 row align-items-end">
                        @csrf
                        <div class="form-group">                        
                            <input type="hidden" class="form-control" name="order" id="order" value="{{$orden->id}}">
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
                            <button type="submit" class="btn btn-light bg-white shadow-sm">Agregar</button>                      
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
                    <form action="{{route('orders.update',['order'=>$orden->id])}}" method="post">
                        @csrf 
                        @method('PUT')                                
                        <input type="hidden"
                            class="form-control" name="status" id="status" value="1">                                                                  
                        <input type="hidden"
                            class="form-control" name="total" id="total" value="{{$totals}}">                                                                  

                        <button type="submit" class="btn btn-light bg-white shadow-sm">Cerrar Orden</button>
                    </form>
                </div> 
                @endif                 
            </div>            
        </div> 
    </div>
    @endsection
