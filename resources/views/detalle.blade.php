@extends('layouts.plantilla')

@section('title', 'Detalle '.$producto)

@section('content')    
        <img style="width:500px" src="../imagen/{{$_SESSION['productos'][$producto][2]}}" />
        <h1>{{$producto}}</h1>
        <strong>Precio: </strong>{{$_SESSION['productos'][$producto][0]}}
        <br><strong>Detalle: </strong>{{$_SESSION['productos'][$producto][1]}}
        <form action="../meteCarro/<?= $producto ?>" method="get">
            <input type="submit" value="Comprar">
        </form>
        <h3><a href="../">VOLVER</a></h3>
@endsection