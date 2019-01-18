<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Integral de Incidencias GDEBA</title>
    {{-- Invocacion al bootstrap, mi estilo y la imagen de favicon --}}
    <link rel = "stylesheet" href= "{{ asset('bootstrap-3.3.7/css/bootstrap.min.css')}}">
    <link rel = "stylesheet" href= "{{ asset('css/inicio.css') }}">
    <link rel = "shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon" />
</head>
<body>
    

    {{-- Inocación a los JS --}}
    <script src="{{ asset('js/login/modalLogin.js') }}"></script>
    <script src="{{ asset('js/login/backgroundLogin.js') }}"></script>
    <script src="{{ asset('js/login/loginFormValidator.js') }}"></script>
    <script src="{{ asset('js/herramientas/modalError.js') }}"></script>
    <script src="{{ asset('js/herramientas/loader.js') }}"></script>
</body>
</html>