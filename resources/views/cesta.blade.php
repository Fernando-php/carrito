@php
    use App\Models\Producto;
@endphp
@extends('layouts.plantilla')

@section('title', 'Contenido Cesta')

@section('content')
<table><tr><th colspan="5"><h3>PRODUCTOS EN TU CESTA</h3></th></tr>
@php
        foreach ($_SESSION['enCesta'] as $id => $cantidad) {
            $producto= Producto::find($id);
@endphp
        <tr><td>{{$producto->nombre}}</td>
            <td>{{$cantidad}}</td>
            <td><img style="width:100px" src="{{asset('imagen/producto.png')}}"/>
                <br>{{$producto->precio}} euros</td>
            <td>    
                <form action="{{route('metecarro',$producto)}}" method="post">
                    @csrf
                    <input type="submit" value="Añadir 1">
                </form>
            </td>
            <td>
                <form action="{{route('quitacarro',$producto)}}" method="post">
                    @csrf
                    <input type="submit" value="Quitar 1">
                </form>
            </td>
        </tr>
@php
        }  
@endphp
    
<tr><td>Total</td>
    <td>{{$_SESSION['cantidad']}}</td>
    <td>{{$_SESSION['total']}}</td><td><a class="a" href="./">VOLVER</a></td></tr></table>
@endsection
