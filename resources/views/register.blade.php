<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importación de boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="mb-3">Regístrate aquí</h4>
                    <form action="{{route('crearusuario')}}" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="">
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="username" name="nombreUsuario" value="">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="text" class="form-control" id="password" name="contraseña" value="">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Ej: 11111@hotmail.com" value="">
                        </div>

                        <div class="mb-3">
                            <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                            <input type="text" class="form-control" id="fechaNacimiento" name="fechaNacimiento"
                                placeholder="Ej: 1998-01-15" value="">
                        </div>

                        <div class="mb-3">
                            <label for="nombreLista" class="form-label">Nombre lista de deseo</label>
                            <input type="text" class="form-control" id="nombreLista" name="nombreLista"
                                placeholder="Ej: mi primera lista de deseos" value="">
                        </div>

                        <div class="mb-3">
                            <label for="Region" class="form-label">Región asociada</label>
                            <select class="form-select mb-4" aria-label="Seleccione una Región asociada:"
                                name="idRegion" id="idRegion">
                                @foreach ($regions as $region)
                                <option value="{{$region->id}}">{{$region->nombreRegion}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="metodoRecarga" class="form-label">Tipo de pago</label>
                            <input type="text" class="form-control" id="metodoRecarga" name="metodoRecarga"
                                placeholder=" Ej: Master card, Visa" value="">
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>