<!DOCTYPE html>
<html lang="es">

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/juegoEliminar.style.css') }}" rel="stylesheet">
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

    <div class="delete-container">
        <h1>Juego a eliminar</h1>
        <form action="{{action('VistaAdminController@gameSoftDelete')}}" method="POST">
            @method('DELETE')
            <div class="txt_field">
                <h5>Juegos</h5>
                <select name="idJuego" id="idJuego">
                    @foreach ($juegos as $juego)
                    <option value="{{$juego->id}}">{{$juego->nombreJuego}}</option>
                    @endforeach
                </select>
            </div>
            <input hidden type="text" class="form-control" name="id" value="{{$admin['id']}}">
            <button type="submit" class="btn btn-success d-grid gap-2 col-2 mx-auto color3">Eliminar Juego</button>
        </form>
    </div>
</body>