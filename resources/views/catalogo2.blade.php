<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEBEDE</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/catalogo2.style.css') }}" rel="stylesheet">
    <!-- FontAwesome-->
    <script src="https://kit.fontawesome.com/3a9c61ce37.js" crossorigin="anonymous"></script>
</head>

<body>
<header>
        <div class="nav">
            <img src="{{ asset('images/logo2.png')}}" alt="" class="logo">
            <a class="debede" href="#">DEBEDE</a>
            <ul class="nav-list">
                <li>
                    <a href="/redirigirPerfil/Id={{$user['id']}}" class="profile" class="profile">
                        <i class="far fa-user"></i>Mi cuenta</a>
                </li>
            </ul>
        </div>
    </header>
    <main>
        <section class="glass">
            <div class="dashboard">
                <div class="links">
                    <div class="link">
                        <a href="/mejoresJuegos" class="mejoresJuegos">
                            <h3><i class="fas fa-chart-line"></i>Mejores juegos</h3>
                        </a>
                    </div>
                    <div class="link">
                        <a href="/" class="cerrarSesion">
                            <h3><i class="fas fa-sign-out-alt"></i>Cerrar sesión</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="games">
                <div class="status">
                    <h1>Cátalogo:</h1>
                    <input type="text" placeholder="Busca un juego">
                </div>
                <div class="cards">
                    @foreach($juegos as $juego)
                    <div class="card">
                        <img src="/images/assassins.png" alt="" />
                        <div class="card-info">
                            <h3>{{$juego->nombreJuego}}</h3>
                            <h3>Edad Recomendada: {{$juego->edadRestriccion}}</h3>
                            <a href="/wishList/userID/{{$user['id']}}/gameID/{{$juego['id']}}"
                                class="btn btn-primary"></a>
                            <h2><i class="fa fa-search"></i>Ver</h2>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
        </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div>
</body>

</html>