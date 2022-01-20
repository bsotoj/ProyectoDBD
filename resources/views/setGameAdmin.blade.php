<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Editar Juego</title>
</head>


<body>

    <form action="{{action('VistaAdminController@adminSetGame')}}" method="POST">
        @method('PUT')
        <H1 class="center display-4">Editar Juego</H1>
        <div class="contenedorJuego">
            <label for="exampleInputPassword1" class="form-label">Nombre Juego Nuevo: </label>
            <input type="text" class="form-control" name="nombreJuego" value="" placeholder="{{$juego['nombreJuego']}}"
                required>
        </div>

        <div class="txt_field">
            <h5>Género</h5>
            <select name="idGenero" id="idGenero">
                @foreach ($generos as $genero)
                <option value="{{$genero->id}}">{{$genero->nombreGenero}}</option>
                @endforeach
            </select>
        </div>
      
        <div class="contenedorJuego">
            <label for="exampleInputPassword1" class="form-label">Edad de Restricción: </label>
            <input type="number" class="form-control" name="edadRestriccion" value="" placeholder="{{$juego['edadRestriccion']}}"
                required>
        </div>

        <div class="contenedorJuego">
            <label for="exampleInputPassword1" class="form-label">Almacenamiento: </label>
            <input type="number" class="form-control" name="almacenamiento" value="" placeholder="{{$juego['almacenamiento']}}"
                required>
        </div>

        <div class="contenedorJuego">
            <label for="exampleInputPassword1" class="form-label">Link de Juego: </label>
            <input type="link" class="form-control" name="linkJuego" value="" placeholder="{{$juego['linkJuego']}}"
                required>
        </div>


        <input hidden type="text" class="form-control" name="id" value="{{$juego['id']}}" >
        <button type="submit" class="btn btn-success d-grid gap-2 col-2 mx-auto color3">Cambiar datos</button>
    </form>
</body>

</html>