<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link rel="StyleSheet" href="{{asset('css/estilos.css')}}" type="text/css">
    <title> @yield('title') </title>
</head>
<body>
    <div class="contenedor">
        <div class="usuario">
            @auth
                <a href="{{ url('/dashboard') }}" >Mi perfil</a>
            @else
                <a href="{{ route('login') }}" >Identifícate</a>
        
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" >Regístrate</a>
                @endif
            @endauth    
        </div>
        <br><hr>
    @yield('content')
</div>
</body>
</html>