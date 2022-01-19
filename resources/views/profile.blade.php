<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DEBEDE</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/profile.style.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <section class="glass">
            <div class="dashboard">
                <div class="user">
                    <img src="./images/profilepic.png" alt="" />
                    <h3> {{$user->nombreUsuario}}</h3>
                    <p>{{$rol->nombreRol}}</p>
                </div>
                <div class="links">
                    <div class="link">
                        <img src="./images/library.png" alt="" />
                        <a href="/usuarios/Id={{$user['id']}}/editarPerfil" class="modificarUsuario">Editar Perfil</a>
                    </div>
                    <div class="link">
                        <img src="./images/twitch.png" alt="" />
                        <h2>Carrito</h2>
                    </div>
                    <div class="link">
                        <img src="./images/steam.png" alt="" />
                        <h2>Lista</h2>
                    </div>
                    <div class="links">
                            <img src="./images/upcoming.png" alt="" />
                            <a href="/cartera" class="cartera">Monedero</a>
                    </div>
                    <div class="link">
                        <img src="./images/library.png" alt="" />
                        <h2>Librería</h2>
                    </div>
                    
                </div>
                <div class="pro">
                    <h2>¿Buscas más juegos?</h2>
                    <img src="./images/controller.png" alt="" />
                </div>
            </div>
            <div class="games">
                <div class="status">
                    <h1>Mis Juegos:</h1>
                    <input type="text" />
                </div>
                <div class="cards">
                    <div class="card">
                        <img src="./images/assassins.png" alt="" />
                        <div class="card-info">
                            <h2>Assassins Creed Valhalla</h2>
                            <p>PC Version</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="./images/sackboy.png" alt="" />
                        <div class="card-info">
                            <h2>Sackboy A Great Advanture</h2>
                            <p>PC Version</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="./images/spiderman.png" alt="" />
                        <div class="card-info">
                            <h2>Spiderman Miles Morales</h2>
                            <p>PC Version</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div>
</body>

</html>