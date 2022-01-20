<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEBEDE</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/profile2.style.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <section class="glass">
            <div class="games">
                <div class="status">
                    <h1>Juegos en la plataforma:</h1>
                    <input type="text" />
                </div>
                <div class="cards">
                    @foreach($juegos as $juego)
                    <div class="card">
                        <img src="./images/assassins.png" alt="" />
                        <div class="card-info">
                            <h2>{{$juego->nombreJuego}}</h2>
                            <p>{{$juego->linkJuego}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="links">
                    <img src="./images/library.png" alt="" />
                    <a href='/redirigirPerfil/Id={{$admin['id']}}' class="cartera">Volver al perfil</a>
                </div>
        </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div>
</body>

</html>