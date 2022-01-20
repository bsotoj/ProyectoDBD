<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEBEDE</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/catalogo2.style.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a9c61ce37.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="nav">
            <img src="{{ asset('images/logo2.png')}}" alt="" class="logo">
            <a class="debede" href="#">DEBEDE</a>
            <ul class="nav-list">
                <li><i class="fas fa-shopping-cart"></i><a href="#">Carrito</a></li>
                <li><i class="far fa-heart"></i><a href="#">Lista de deseos</a></li>
                <li><i class="far fa-user"></i></i><a href='/redirigirPerfil/Id={{$admin['id']}}' class="profile">Mi
                        cuenta</a></li>
            </ul>
        </div>
    </header>
    <main>
        <section class="glass">
            <div class="games">
                <div class="status">
                    <h1>Juegos en la plataforma:</h1>
                </div>
                <div class="cards">
                    @foreach($juegos as $juego)
                    <div class="card">
                        <img src="/images/spiderman.png" alt="" />
                        <div class="card-info">
                            <h3>Nombre: {{$juego->nombreJuego}}</h3>
                            <h3>Edad Recomendada: {{$juego->edadRestriccion}}</h3>
                            <h3>Tipo de almacenamiento: {{$juego->almacenamiento}}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="links">
                    <a href='/redirigirPerfil/Id={{$admin['id']}}' class="profile">
                        <h2><i class="far fa-user"></i>Volver al perfil</h2>
                    </a>
                </div>
        </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div>
</body>

</html>