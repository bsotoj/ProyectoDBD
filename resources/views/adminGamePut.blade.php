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
            <ul class="nav-list">
                <li><a href="#">Ayuda</a></li>
            </ul>
        </div>
    </header>

   
    <div class="container">
        <h1>Seleccionar juego a modificar</h1>
        <form action="{{action('VistaAdminController@prepararJuegoModificar')}}" method="GET">
            <div class="txt_field">
                <h5>Juegos</h5>
                <select name='id' id='id'>
                @foreach ($juegos as $juego)
                    <option value="{{$juego->id}}">{{$juego->nombreJuego}}</option>
                    @endforeach
                </select>    
            </div>
           
            <input type="submit" value="Modificar">
            <div class="signup_link"><a href="/profile">Volver a perfil</a>
        </form>
    </div>
</body>

</html>
