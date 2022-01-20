<!DOCTYPE html>
<html lang="es">

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/crearJuego.style.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>
    <header>
        <div class="nav">
            <img src="{{ asset('images/logo2.png')}}" alt="" class="logo">
            <a class="debede" href="#">DEBEDE</a>
            <ul class="nav-list">
                <li><i class="fas fa-shopping-cart"></i><a href="#">Carrito</a></li>
                <li><i class="far fa-heart"></i><a href="#">Lista de deseos</a></li>
                <li><i class="far fa-user"></i></i><a href="#">Mi cuenta</a></li>
            </ul>
        </div>
    </header>


    <div class="edit-container">
        <h1>Juego a modificar</h1>
        <form action="{{action('VistaAdminController@prepararJuegoModificar')}}" method="GET">
            <div class="txt_field">
                <h5>Juegos</h5>
                <select name='id' id='id'>
                    @foreach ($juegos as $juego)
                    <option value="{{$juego->id}}">{{$juego->nombreJuego}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success d-grid gap-2 col-2 mx-auto color3">Modificar juego</button>
        </form>
    </div>
</body>

</html>