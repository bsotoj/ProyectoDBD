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
        <h1>Editar juego</h1>

        <form action="{{route('setUserProfile')}}" method="POST">
            @method('PUT')

            <div class="txt_field">
                <h5>Nombre juego</h5>
                <select name="id" id="id">
                    @foreach ($juegos as $juego)
                    <option value="{{$juego->id}}">{{$juego->nombreJuego}}</option>
                    @endforeach
                </select>
            </div>

            <div class="txt_field">
                <h5>Nuevo nombre juego</h5>
                <input type="text" name="nombre" value="" placeholder="{{$juego['nombreJuego']}}" required>
            </div>


            <div class="txt_field">
                <h5>Id género</h5>
                <input type="number" name="idGenero" value="" placeholder="{{$juego['idGenero']}}" required>
            </div>

            <div class="txt_field">
                <h5>Edad restricción</h5>
                <input type="number" name="edadRestriccion" value="" placeholder="{{$juego['edadRestriccion']}}" required>
            </div>

            <div class="txt_field">
                <h5>Almacenamiento</h5>
                <input type="text" ame="almacenamiento" value="" placeholder="{{$juego['almacenamiento']}}" required>
            </div>

            <div class="txt_field">
                <h5>Link juego</h5>
                <input type="text" rname="linkJuego" value="" placeholder="{{$juego['linkJuego']}}" required>
            </div>

            <input hidden type="text" class="form-control" name="id" value="{{$usuario['id']}}">
            <button type="submit" class="btn btn-success d-grid gap-2 col-2 mx-auto color3">Cambiar datos</button>
        </form>
    </div>
</body>

</html>