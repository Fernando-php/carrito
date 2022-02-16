@extends('layouts.plantilla')

@section('title', 'Contenido Cesta')

@section('content')
<table border = "1"><tr><th colspan="4"><h3>PRODUCTOS EN TU CESTA</h3></th></tr>
@php
        foreach ($_SESSION['enCesta'] as $prod => $cantidad) {
@endphp
        <tr><td>{{$prod}}</td>
            <td>{{$cantidad}}</td>
            <td><img style="width:100px" src="../public/imagen/{{$_SESSION['productos'][$prod][2]}}"/>
                <br>{{$prod}}
                <br>{{$_SESSION['productos'][$prod][0]}} euros</td>
            <td><form action="quitaCarro/{{$prod}}" method="get">
                <input type="submit" value="Quitar uno">
            </form></td></tr>
@php
        }  
@endphp
    
<tr><td>Total</td>
    <td>{{$_SESSION['cantidad']}}</td>
    <td>{{$_SESSION['total']}}</td><td><a href="./">VOLVER</a></td></tr></table>
@endsection
