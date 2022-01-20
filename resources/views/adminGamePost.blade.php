<!DOCTYPE html>
<html lang="es">

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/crearJuego.style.css') }}" rel="stylesheet">
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
        </div>
    </header>
    
    <div class="edit-container">
        <h1>Agregar un nuevo juego</h1>
        <form action="{{route('gameByAdmin')}}" method="POST">

            <div class="txt_field">
                <h5>Nombre del Juego</h5>
                <input type="text" name="nombreJuego" value="" required >
            </div>


            <div class="txt_field">
                <h5>Restricción edad</h5>
                <input type="number" name="edadRestriccion" required>
            </div>

            <div class="txt_field">
                <h5>Almacenamiento</h5>
                <input type="number" name="almacenamiento" value="" required>
            </div>

            <div class="txt_field">
                <h5>Link del juego</h5>
                <input type="text" name="linkJuego" value="" required>
            </div>

            <div class="txt_field">
                <h5>Género</h5>
                <select name="idGenero" id="idGenero">
                    @foreach ($genero as $gen)
                    <option value="{{$gen->id}}">{{$gen->nombreGenero}}</option>
                    @endforeach
                </select>
            </div>

            <input hidden type="text" class="form-control" name="id" value="{{$usuario['id']}}">
            <button type="submit" class="btn btn-success d-grid gap-2 col-2 mx-auto color3">Crear juego</button>
        </form>
    </div>
</body>

</html>