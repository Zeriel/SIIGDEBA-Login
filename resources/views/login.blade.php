<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Integral de Incidencias GDEBA</title>
    {{-- Invocacion al bootstrap, mi estilo y la imagen de favicon --}}
    <link rel = "stylesheet" href= "{{ asset('bootstrap-3.3.7/css/bootstrap.min.css')}}">
    <link rel = "stylesheet" href= "{{ asset('css/login.css') }}">
    <link rel = "shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon" />
</head>
<body>

    {{-- Modal para error, si hay error aparece cargado --}}
    <div id="errorModal" @if ($errors->any()) style="display: block;" @endif class="errorModal">

        {{-- Contenido del modal, trae el titulo y motivo del loginController --}}
        <div class="errorModal-content animate">
            <p id="titulo">{{ $errors->first('titulo') }}</p>
            <hr>
            <p id="cuerpo">{{ $errors->first('motivo') }}<br>{{ $errors->first('motivo2') }}</p>
            <button class="errorClose" id="errorClose">Aceptar</button>
        </div> 
    </div>

    {{-- Boton para abrir modal --}}
    <div id="btnContainer">
        <button id="myBtn"  @if ($errors->any()) style="display: none;" @endif>Iniciar sesión</button>
    </div>

    {{-- Loader --}}
    <div id="loaderContainer" style="display: none;" class="loaderContainer">
        <div class="loader">
            <div class="spinner"></div>
        </div>
    </div>
    

    {{-- El modal de logueo, si hay error aparece cargado --}}
    <div id="myModal" @if ($errors->any()) style="display: block;" @endif class="modal">

        {{-- Contenido del modal --}}
        <div class="modal-content animate">
            <span class="close">&times;</span>

            {{ Form::open(['url' => 'login']) }}

                {{-- Campo CUIT --}}
                <div class="group">
                    {{ Form::number('user', old('user'),
                    ['required' => 'required', 'autocomplete' => 'off', 'onkeyup' => 'checkSubmit()',
                        'id' => 'user', 'maxlength' => '11', 'oninput' => 'validarCUIT()']) }}
                    <span class="highlight"></span><span class="bar"></span>
                    <label>CUIT de usuario</label>
                </div>

                {{-- Campo PASSWORD --}}
                <div class="group">
                    {{ Form::password('password', ['required' => 'required',
                                    'onkeyup' => 'checkSubmit()', 'id' => 'pass']) }}
                    <span class="highlight"></span><span class="bar"></span>
                    <label>Contraseña</label>
                </div>

                {{-- SUBMIT, disabled hasta que los input tengan datos --}}
                <div class="btn-box">
                    {{ Form::submit('Ingresar', ['disabled' => 'true', 'id' => 'run',
                                    'class' => 'submitButton', 'onclick' => 'toggleLoader()']) }}
                </div>

            {{ Form::close() }}
        </div>
    
    </div>
    
    {{-- JQuery --}}
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    {{-- Inocación a los JS --}}
    <script src="{{ asset('js/login/modalLogin.js') }}"></script>
    <script src="{{ asset('js/login/backgroundLogin.js') }}"></script>
    <script src="{{ asset('js/login/loginFormValidator.js') }}"></script>
    <script src="{{ asset('js/herramientas/modalError.js') }}"></script>
    <script src="{{ asset('js/herramientas/loader.js') }}"></script>

</body>
</html>