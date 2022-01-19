<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Crear Juego</title>
</head>


<body>
    <form action="{{route('nuevoJuego')}}" method="POST">
        <H1 class="center display-4">Agregar un nuevo juego</H1>
        <div class="txt_field">
            <label for="exampleInputPassword1" class="form-label">Nombre: </label>
            <input type="text" class="form-control" name="nombreJuego" value="" 
                required>
        </div>

        <div class="txt_field">
            <label for="exampleInputPassword1" class="form-label">Edad Restricción: </label>
            <input type="number" class="form-control" name="edadRestriccion" value="" 
                required>
        </div>

        <div class="txt_field">
            <label for="exampleInputPassword1" class="form-label">Almacenamiento requerido: </label>
            <input type="text" class="form-control" name="almacenamiento" value="" placeholder="100"
                required>
        </div>

        <div class="txt_field">
            <label for="exampleInputPassword1" class="form-label">Link del Juego: </label>
            <input type="text" class="form-control" name="linkJuego" value="" placeholder="https://www.youtube.com/watch?v=OOB3j9lmBZI&ab_channel=MaximusDread"
                required>
        </div>

    
        <div class="txt_field">
                <h5>Género</h5>
                <select name="format" id="format"name="idGenero" id="idGenero">
                    @foreach ($genero as $gen)
                    <option value="{{$gen->id}}">{{$gen->nombreGenero}}</option>
                    @endforeach
                </select>
            </div>

        <input hidden type="text" class="form-control" name="id" value="{{$usuario['id']}}">
        <button type="submit" class="btn btn-success d-grid gap-2 col-2 mx-auto color3">Agregar juego</button>
    </form>
</body>

</html>