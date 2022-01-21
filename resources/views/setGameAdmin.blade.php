<!DOCTYPE html>
<html lang="es">

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/juegoEliminar.style.css') }}" rel="stylesheet">
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
                <li><i class="fas fa-shopping-cart"></i><a href="#">Carrito</a></li>
                <li><i class="far fa-heart"></i><a href="#">Lista de deseos</a></li>
                <li><i class="far fa-user"></i></i><a href="#">Mi cuenta</a></li>
            </ul>
        </div>
    </header>

    <div class="delete-container">
        <h1>Editar juego</h1>

        <form action="{{route('editarJuego')}}" method="POST">
            @method('PUT')

            <div class="txt_field">
                <h5>Nuevo nombre juego</h5>
                <input type="text" name="nombre" value="" placeholder="{{$juego['nombreJuego']}}" required>
            </div>

            <div class="txt_field">
                <h5>Género</h5>
                <select name="idGenero" id="idGenero">
                    @foreach ($generos as $genero)
                    <option value="{{$genero->id}}">{{$genero->nombreGenero}}</option>
                    @endforeach
                </select>
            </div>
            <div class="txt_field">
                <h5>Edad restricción</h5>
                <input type="number" name="edadRestriccion" value="" placeholder="{{$juego['edadRestriccion']}}" required>
            </div>

            <div class="txt_field">
                <h5>Almacenamiento</h5>
                <input type="number" ame="almacenamiento" value="" placeholder="{{$juego['almacenamiento']}}" required>
            </div>

            <div class="txt_field">
                <h5>Link juego</h5>
                <input type="text" rname="linkJuego" value="" placeholder="{{$juego['linkJuego']}}" required>
            </div>

            <input hidden type="text" class="form-control" name="id" value="{{$juego['id']}}" >
            <button type="submit" class="btn btn-success d-grid gap-2 col-2 mx-auto color3">Cambiar datos</button>
        </form>
    </div>
</body>

</html>