<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DEBEDE</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/biblioteca.style.css') }}" rel="stylesheet">
</head>


<body>
    <main>
        <section class="glass">
            <div class="dashboard">
                <div class="libreria">
                    <h1>Libreria</h1>
                </div>
                <div class="usuario">
                    <img src="/images/profilepic.png" alt="" />
                    <p>{{$usuario->nombreUsuario}}</p>
                </div>
                <div class="buscar">
                    <h3>Buscar Juego</h3>
                    <input type="text" />
                </div>

            </div>
            <div class="games">
                <div class="user">
                    <h2>Juegos</h2>
                    <div class="card">
                        @foreach($juegos as $juego)
                        <img src="/images/assassins.png" alt="" />
                        <div class="card-info">
                            <h5>{{$juego->nombreJuego}}</h5>
                            <h5>{{$juego->idGenero}}</h5>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div>

</body>

</html>