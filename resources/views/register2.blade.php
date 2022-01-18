<!DOCTYPE html>
<html lang="es">

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/register3.style.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importación de boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                <input type="text" required name="nombre">
                <label>Nombre</label>
            </div>


            <div class="txt_field">
                <input type="text" required name="nombreUsuario">
                <label>Usuario</label>
            </div>

            <div class="txt_field">
                <input type="password" required name="contraseña">
                <label>Contraseña</label>
            </div>

            <div class="txt_field">
                <input type="email" required name="email">
                <label>Correo electrónico</label>
            </div>

            
            <div class="txt_field">
                <h5>Fecha de nacimiento</h5>
                <input type="date" required name="fechaNacimiento">
            </div>

            
            <div class="txt_field">
                <input type="text" required name="nombreLista">
                <label>Nombre lista de deseos</label>
            </div>


               
            <div class="txt_field">
                <input type="text" required name="metodoRecarga">  
                <label>Forma de pago</label>
            </div>

            <div class="txt_field">
                <h5>Región</h5>
                <label for="Region" class="form-label"></label>
                <select class="form-select mb-4" aria-label="Seleccione una Región asociada:" name="idRegion"
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