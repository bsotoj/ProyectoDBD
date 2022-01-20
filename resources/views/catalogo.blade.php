<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEBEDE</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/catalogo.style.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a9c61ce37.js" crossorigin="anonymous"></script>
</head>

<body>
    <form action="{{route('getGames')}}" method="GET">
        <main>
            <section class="glass">
                <div class="dashboard">

                    <div class="links">
                        <div class="link">
                            <a href="#" class="modificarUsuario">
                                <h3><i class="far fa-user"></i>Mejores juegos</h3>
                            </a>
                        </div>

                        <div class="link">
                            <a href="#" class="modificarUsuario">
                                <h3><i class="fas fa-user-cog"></i>Operaciones Admin</h3>
                            </a>
                        </div>

                        <div class="link">
                            <a href="/" class="cerrarSesion">
                                <h3><i class="fas fa-sign-out-alt"></i>Cerrar seseión</h3>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="games">
                    <div class="status">
                        <h1>Cátalogo:</h1>
                        <input type="text" placeholder="Buscar Juego...">
                    </div>
                    <div class="cards">
                        @foreach($juegos as $juego)
                        <div class="card">
                            <img src="./images/assassins.png" alt="" />
                            <div class="card-info">
                                <h3>{{$juego->nombreJuego}}</h3>
                                <h3>Edad Recomendada: {{$juego->edadRestriccion}}</h3>
                                <a href="/juego" class="btn btn-primary">
                                    <h2>Ver</h2>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="/">
                        <h1><i class="fa fa-home"></i>Salir</h1>
                    </a>
            </section>
        </main>
        <div class="circle1"></div>
        <div class="circle2"></div>
    </form>
</body>

</html>