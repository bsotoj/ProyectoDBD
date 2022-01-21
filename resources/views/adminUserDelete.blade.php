<!DOCTYPE html>
<html lang="es">

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/register3.style.css') }}" rel="stylesheet">
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

    <div class="register-container">
        <h1>Seleccionar usuario a eliminar</h1>
        <form action="{{action('VistaAdminController@softDelete')}}" method="POST">
            @method('DELETE')
            <div class="txt_field">
                <h5>Usuarios</h5>
                <select name="id" id="id">
                    @foreach ($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->nombreUsuario}}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Eliminar">
            <div class="signup_link"><a href="/profile">Volver a perfil</a>
        </form>
    </div>
</body>

</html>