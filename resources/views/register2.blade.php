<!DOCTYPE html>
<html>

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/register3.style.css') }}" rel="stylesheet">

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

    <div class="register-container">
        <h1>Registrate</h1>
        <form class="input-container">

            <div class="txt_field">
                <input type="text" required>
                <label>Nombre</label>
            </div>

            <div class="txt_field">
                <input type="text" required>
                <label>Usuario</label>
            </div>

            <div class="txt_field">
                <input type="password" required>
                <label>Contraseña</label>
            </div>

            <div class="txt_field">
                <input type="email" required>
                <label>Correo electrónico</label>
            </div>

            <div class="txt_field">
                <h5>Fecha de nacimiento</h5>
                <input type="date" required>
            </div>

            <div class="txt_field">
                <input type="text" required>
                <label>Nombre lista de deseos</label>
            </div>

            <div class="txt_field">
                <input type="text" required>
                <label>Forma de pago</label>
            </div>

            <div class="txt_field">
                <h5>Región</h5>
                <select name="format" id="format">
                    name="idRegion" id="idRegion">
                    @foreach ($regions as $region)
                    <option value="{{$region->id}}">{{$region->nombreRegion}}</option>
                    @endforeach
                    <!--<option value="Atacama">Atacama</option>
                    <option value="Arica">Arica</option>-->
                </select>
            </div>

            <input type="submit" value="Registrate">
            <div class="signup_link">¿Ya estas registradx?<a href="/login">Ingresa aquí</a>
        </form>
    </div>
</body>

</html>