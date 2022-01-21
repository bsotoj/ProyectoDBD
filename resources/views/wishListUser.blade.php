<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link href="{{ asset('css/listaDeseos3.style.css') }}" rel="stylesheet">
    <!-- FontAwesome-->
    <script src="https://kit.fontawesome.com/3a9c61ce37.js" crossorigin="anonymous"></script>
    <title>DEBEDE</title>
</head>

<body>
    <header>
        <div class="nav">
            <img src="{{ asset('images/logo2.png')}}" alt="" class="logo">
            <a class="debede" href="#">DEBEDE</a>
            <ul class="nav-list">
                <li>
                    <a href="/redirigirPerfil/Id={{$user['id']}}" class="profile" class="profile">
                        <i class="far fa-user"></i>Mi cuenta</a>
                </li>
            </ul>
        </div>
    </header>

    <div class="small-container cart-page">
        <h1>Lista de deseos de {{$user->nombreUsuario}}</h1>
        <table>
            @foreach($aux as $juego)
            <tr>
                <th>Nombre juego</th>
                <th>Espacio requerido</th>
                <th>Edad restricción</th>
                <th>Link</th>
                <th>Opciones</th>
            </tr>

            <tr>
                <td>{{$juego->nombreJuego}}</td>
                <td>{{$juego->almacenamiento}}</td>
                <td>{{$juego->edadRestriccion}}</td>
                <td>{{$juego->linkJuego}}</td>
                <td>
                    <div class="opciones">
                        <a href="#">
                            <h3>Quitar de la lista de deseos</h3>
                        </a>
                        <a href="#">
                            <h3>Añadir al carrito</h3>
                        </a>
                    </div>
                </td>
            </tr>

            @endforeach
        </table>
    </div>
</body>

</html>