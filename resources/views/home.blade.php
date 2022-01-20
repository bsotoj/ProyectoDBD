<!DOCTYPE html>
<html>

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link rel="stylesheet" type="text/CSS" href="login_style.css">
    <!--Incluye archivo normalize-->
    <link rel="stylesheet" type="text/CSS" href="normalize.css">
    <link href="{{ asset('css/home.style.css') }}" rel="stylesheet">


</head>

<body>
    <header>
        <div class="nav">
            <img src="{{ asset('images/logo2.png')}}" alt="" class="logo">
            <a class="debede" href="/">DEBEDE</a>
        </div>
    </header>

    <div class="home">
        <div class="content">
            <h2>DEBEDE</h2>
            <p>Gaming a otro nivel.</p>
            <a href="{{route('regiones')}}" class="register">Registrarse</a>
            <a href="/login" class="login">Iniciar sesion</a>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Nosotros</h4>
                    <ul>
                        <li><a>Luis González</a></li>
                        <li><a>Bastián Soto</a></li>
                        <li><a>José Llancamil</a></li>
                        <li><a>Catalina Riquelme</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Institución</h4>
                    <ul>
                        <li><a>Universidad de Santiago de Chile</a></li>
                        <li><a>Departamento de Ingeniería Informática</a></li>
                        <li><a>Laboratorio Diseño de Base de Datos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>