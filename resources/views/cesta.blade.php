@php
    use App\Models\Producto;
@endphp
@extends('layouts.plantilla')

@section('title', 'Contenido Cesta')

@section('content')
<table border = "1"><tr><th colspan="4"><h3>PRODUCTOS EN TU CESTA</h3></th></tr>
@php
        foreach ($_SESSION['enCesta'] as $id => $cantidad) {
            $producto= Producto::find($id);
@endphp
        <tr><td>{{$id}}</td>
            <td>{{$cantidad}}</td>
            <td><img style="width:100px" src="{{asset('imagen/producto.png')}}"/>
                <br>{{$producto->nombre}}
                <br>{{$productos->precio}} euros</td>
            <td><form action="{{route('quitacarro',$producto)}}" method="get">
                <input type="submit" value="Quitar uno">
            </form></td></tr>
@php
        }  
@endphp
    
<tr><td>Total</td>
    <td>{{$_SESSION['cantidad']}}</td>
    <td>{{$_SESSION['total']}}</td><td><a href="./">VOLVER</a></td></tr></table>
@endsection
