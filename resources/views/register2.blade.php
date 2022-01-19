<!DOCTYPE html>
<html lang="es">

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/register3.style.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

        <form action="{{route('crearusuario')}}" method="post">

            <div class="txt_field">
<<<<<<< HEAD
                <input type="text" required name="nombre">
=======
                <input type="text" id="nombre" name="nombre" value="" required>
>>>>>>> main
                <label>Nombre</label>
            </div>


            <div class="txt_field">
<<<<<<< HEAD
                <input type="text" required name="nombreUsuario">
=======
                <input type="text" id="username" name="nombreUsuario" value="" required>
>>>>>>> main
                <label>Usuario</label>
            </div>

            <div class="txt_field">
<<<<<<< HEAD
                <input type="password" required name="contraseña">
                <label>Contraseña</label>
            </div>

            <div class="txt_field">
                <input type="email" required name="email">
=======
                <input type="password" id="password" name="contraseña" value="" required>
                <label>Contraseña</label>
            </div>


            <div class="txt_field">
                <input type="email" id="email" name="email" value="" required>
>>>>>>> main
                <label>Correo electrónico</label>
            </div>

            
            <div class="txt_field">
                <h5>Fecha de nacimiento</h5>
<<<<<<< HEAD
                <input type="date" required name="fechaNacimiento">
=======
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value=""required>
>>>>>>> main
            </div>

            
            <div class="txt_field">
<<<<<<< HEAD
                <input type="text" required name="nombreLista">
=======
                <input type="text" id="nombreLista" name="nombreLista" value="" required>
>>>>>>> main
                <label>Nombre lista de deseos</label>
            </div>


               
            <div class="txt_field">
<<<<<<< HEAD
                <input type="text" required name="metodoRecarga">  
=======
                <input type="text" id="metodoRecarga" name="metodoRecarga" value=""required>
>>>>>>> main
                <label>Forma de pago</label>
            </div>

            <div class="txt_field">
                <h5>Región</h5>
                <select name="format" id="format"name="idRegion" id="idRegion">
                    id="idRegion">
                    @foreach ($regions as $region)
                    <option value="{{$region->id}}">{{$region->nombreRegion}}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Registrate">
            <div class="signup_link">¿Ya estas registradx?<a href="/login">Ingresa aquí</a>
        </form>
    </div>
</body>

</html>