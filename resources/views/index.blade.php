@extends('layouts.plantilla')

@section('title', 'Listado Productos')

@section('content')
<table>
    <tr><th><img id="logo" src="{{asset('imagen/tiendecita.png')}}" alt=""></th><th colspan="3"><h1>LA TIENDECITA INFORMÁTICA</h1></th></tr>
<tr><th>Producto</th><th>Precio</th><th>Imagen</th><th><a class="a" href="cesta">CESTA {{$_SESSION['cantidad']}}Prod</th></tr>
@foreach ($productos as $producto)
<tr>
    <td>{{$producto->nombre}}</td>
    <td>{{$producto->precio}}</td>
    <td><a class="a" href="{{route('detalle',$producto)}}"><img style="width:100px" src="{{asset('imagen/'.$producto->imagen)}}"/></td>
    <td>    
        <form action="{{route('metecarro',$producto)}}" method="post">
            @csrf
            <input type="submit" value="Comprar">
        </form>
    </td>
</tr>
@endforeach
</table>
<br>
{{$productos->links()}}
@endsection
