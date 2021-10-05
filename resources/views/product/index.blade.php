@extends('layouts.app')
@section('content')
<div class="col-12  table-responsive">
    <table class="table table-bordered border-primary bg-white">
        <thead class="thead-inverse">
        <tr>
            <th>Referencia</th>
            <th>Name</th>
            <th>descripción</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)                             
            <tr>
                <td scope="row"> {{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->descript}}</td>
                <td>${{$item->price}} U.S</td>
            </tr>
            @endforeach                             
        </tbody>
    </table>                
</div> 
@endsection