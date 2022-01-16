<!DOCTYPE html>
<html>

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link rel="stylesheet" type="text/CSS" href="login_style.css">
    <!--Incluye archivo normalize-->
    <link rel="stylesheet" type="text/CSS" href="normalize.css">
    <link href="{{ asset('css/login2.style.css') }}" rel="stylesheet">


</head>

<body>
    <header>
        <div class="nav">
            <img src="{{ asset('images/logo2.png')}}" alt="" class="logo">
            <ul class="nav-list">
                <li><a href="#">Ayuda</a></li>
            </ul>
        </div>
    </header>

    <div class="login-container">
        <h1>Inicia sesión</h1>
        <form class="input-container">
            <div class="txt_field">
                <input type="text" required>
                <label>Usuario</label>
            </div>

            <div class="txt_field">
                <input type="password" required>
                <label>Contraseña</label>
            </div>
            <input type="submit" value="Iniciar sesión">
        </form>
    </div>
</body>

</html>