@extends('layouts.plantilla')

@section('title', 'Detalle '.$producto->nombre)

@section('content')    
        <img style="width:500px" src="{{asset('imagen/'.$producto->imagen)}}" />
        <h1>{{$producto->nombre}}</h1>
        <strong>Precio: </strong>{{$producto->precio}}
        <br><strong>Detalle: </strong>{{$producto->detalle}}
        <form action="{{route('metecarro',$producto)}}" method="post">
            @csrf
            <input type="submit" value="Comprar">
        </form>
        <h3><a href="{{route('inicio')}}">VOLVER</a></h3>
@endsection