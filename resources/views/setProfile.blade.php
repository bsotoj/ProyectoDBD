<!DOCTYPE html>
<html lang="es">

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/setProfile3.style.css') }}" rel="stylesheet">
    <!-- FontAwesome-->
    <script src="https://kit.fontawesome.com/3a9c61ce37.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>
    <header>
        <div class="nav">
            <img src="{{ asset('images/logo2.png')}}" alt="" class="logo">
            <a class="debede" href="#">DEBEDE</a>
            <ul class="nav-list">
                <li>
                    <a href="/redirigirPerfil/Id={{$usuario['id']}}" class="profile" class="profile">
                        <i class="far fa-user"></i>Mi cuenta</a>
                </li>
            </ul>
        </div>
    </header>

    <div class="edit-container">
        <h1>Editar perfil</h1>

        <form action="{{route('setUserProfile')}}" method="POST">
            @method('PUT')

            <div class="txt_field">
                <h5>Nombre</h5>
                <input type="text" required name="nombre" value="" placeholder="{{$usuario['nombre']}}">
            </div>


            <div class="txt_field">
                <h5>Usuario</h5>
                <input type="text" required name="nombreUsuario" value="" placeholder="{{$usuario['nombreUsuario']}}">
            </div>

            <div class="txt_field">
                <h5>Contraseña</h5>
                <input type="password" required name="contraseña" value="" placeholder="{{$usuario['contraseña']}}">
            </div>

            <div class="txt_field">
                <h5>Fecha de nacimiento</h5>
                <input type="date" required name="fechaNacimiento" value="" placeholder="{{$usuario['fechaNacimiento']}}">
            </div>

            <div class="txt_field">
                <h5>Región</h5>
                <select name="idRegion" id="idRegion">
                    @foreach ($regiones as $region)
                    <option value="{{$region->id}}">{{$region->nombreRegion}}</option>
                    @endforeach
                </select>
            </div>

            <input hidden type="text" class="form-control" name="id" value="{{$usuario['id']}}">
            <button type="submit" class="btn btn-success d-grid gap-2 col-2 mx-auto color3">Cambiar datos</button>
        </form>
    </div>
</body>

</html>