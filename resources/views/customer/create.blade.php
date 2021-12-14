@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 bg-white shadow p-4">                    
                <div class="col-12">
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
            </div>
        </div>
    </div>
@endsection
