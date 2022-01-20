<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Editar perfil</title>
</head>


<body>
    <form action="{{route('upUser')}}" method="POST">
        @method('PUT')
        <H1 class="center display-4">Editar Perfil</H1>
        <div class="contenedorPerfil">
            <label for="exampleInputPassword1" class="form-label">Nombre: </label>
            <input type="text" class="form-control" name="nombre" value="" placeholder="{{$usuario['nombre']}}"
                required>
        </div>

        <div class="contenedorPerfil">
            <label for="exampleInputPassword1" class="form-label">Contraseña: </label>
            <input type="text" class="form-control" name="contraseña" value="" placeholder="{{$usuario['contraseña']}}"
                required>
        </div>

        <div class="contenedorPerfil">
            <label for="exampleInputPassword1" class="form-label">Nombre de Usuario: </label>
            <input type="text" class="form-control" name="nombreUsuario" value="" placeholder="{{$usuario['nombreUsuario']}}"
                required>
        </div>

        <div class="contenedorPerfil">
            <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento: </label>
            <input type="date" class="form-control" name="fechaNacimiento" value="" placeholder="{{$usuario['fechaNacimiento']}}"
                required>
        </div>

        <div class="txt_field">
            <h5>Región</h5>
            <select name="format" id="format" name="idRegion" id="idRegion">
                @foreach ($regiones as $region)
                <option value="{{$region->id}}">{{$region->nombreRegion}}</option>
                @endforeach
            </select>
        </div>

        <input hidden type="text" class="form-control" name="id" value="{{$usuario['id']}}">
        <button type="submit" class="btn btn-success d-grid gap-2 col-2 mx-auto color3">Cambiar datos</button>
    </form>
</body>

</html>