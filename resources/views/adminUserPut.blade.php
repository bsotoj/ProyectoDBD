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
        </div>
    </header>


    <div class="delete-container">
        <h1>Seleccionar usuario a modificar</h1>
        <form action="{{action('VistaAdminController@prepararUsuarioModificar')}}" method="GET">
            <div class="txt_field">
                <h5>Usuarios</h5>
                <select name='id' id='id'>
                    @foreach ($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->nombreUsuario}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success d-grid gap-2 col-2 mx-auto color3">Modificar</button>

        </form>
    </div>
</body>

</html>