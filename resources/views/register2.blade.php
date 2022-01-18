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
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="">
            </div>


            <div class="txt_field">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="nombreUsuario" value="">
            </div>


            <div class="txt_field">
                <label for="password" class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="password" name="contraseña" value="">
            </div>



            <div class="txt_field">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="text" class="form-control" id="email" name="email" 
                    value="">
            </div>

            <div class="txt_field">
                <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="text" class="form-control" id="fechaNacimiento" name="fechaNacimiento"
                     value="">
            </div>

            <div class="txt_field">
                <label for="nombreLista" class="form-label">Nombre lista de deseo</label>
                <input type="text" class="form-control" id="nombreLista" name="nombreLista"
                     value="">
            </div>


            <div class="txt_field">
                <label for="metodoRecarga" class="form-label">Forma de Pago</label>
                <input type="text" class="form-control" id="metodoRecarga" name="metodoRecarga"
                    value="">
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