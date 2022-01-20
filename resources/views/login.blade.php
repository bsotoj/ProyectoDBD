<!DOCTYPE html>
<html>

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/login3.style.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <div class="nav">
            <img src="{{ asset('images/logo2.png')}}" alt="" class="logo">
            <a class="debede" href="/">DEBEDE</a>
            <ul class="nav-list">
                <li><a href="#">Ayuda</a></li>
            </ul>
        </div>
    </header>


    <div class="login-container">
        <h1>Inicia sesión</h1>
        <form action="{{route('infoLogin')}}" method="GET" class="input-container">
            <div class="txt_field">
                <input type="text" required name="nombreUsuario">
                <label>Nombre</label>
            </div>

            <div class="txt_field">
                <input type="password" required name="contraseña">
                <label>Contraseña</label>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <input type="submit" value="Iniciar sesión">
            <div class="signup_link">¿No estas registradx?<a href="{{route('regiones')}}">Regístrate aqui</a>
        </form>
    </div>
</body>

</html>