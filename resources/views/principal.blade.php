@extends('layouts.plantilla')

@section('title', 'Bienvenida')

@section('content')    

<img src="{{asset('imagen/tiendecita.png')}}" alt="" style="width: 300px; margin-left: 230px;">
<br><br>
<h3><a class="a" href="{{route('inicio')}}">ACCEDER</a></h3>
@endsection
