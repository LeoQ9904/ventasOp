@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Acciones a realizar</div>

                <div class="card-body text-center">
                   <a href="{{route('invoices.create')}}" class="btn btn-primary">Nueva Orden</a>
                   <a href="{{route('products.create')}}" class="btn btn-primary">Nuevo Producto</a>
                   <a href="{{route('products.index')}}" class="btn btn-primary">Listado de Productos</a>
                   <a href="{{route('customers.create')}}" class="btn btn-primary">Nuevo Cliente</a>
                   <a href="" class="btn btn-primary">Revisar Facturación</a>
                </div>
            </div>
        </div>
        <div class="col-12">
           
        </div>
    </div>
</div>
@endsection
