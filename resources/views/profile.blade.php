<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DEBEDE</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <!-- FontAwesome-->
    <script src="https://kit.fontawesome.com/3a9c61ce37.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/profile2.style.css') }}" rel="stylesheet">
</head>

<body>

    <main>
        <section class="glass">
            <div class="dashboard">
                <div class="user">
                    <img src="./images/profilepic.png" alt="" />
                    <h3>{{$user->nombreUsuario}}</h3>
                    <p>{{$rol->nombreRol}}</p>
                </div>
                <div class="links">
                    <div class="link">
<<<<<<< Updated upstream
=======
                        <img src="./images/library.png" alt="" />
                        <a href="/administrar/Id={{$user['id']}}/admin" class="administrar">
                            <h3>Administrar</h3>
                        </a>
                    </div>

                    <div class="link">
                        <img src="./images/library.png" alt="" />
>>>>>>> Stashed changes
                        <a href="/usuarios/Id={{$user['id']}}/editarPerfil" class="modificarUsuario">
                        <h3><i class="far fa-user"></i>Editar Perfil</h3>
                        </a>
                    </div>
                    <div class="link">
                        <a href="/carrito" class="carrito">
                            <h3><i class="fas fa-shopping-cart"></i>Carrito</h3>
                        </a>
                    </div>
                    <div class="link">
                        <a href="/listaDeseos" class="listaDeseos">
                            <h3><i class="far fa-heart"></i></i>Mi Lista</h3>
                        </a>
                    </div>

                    <div class="link">
                        <a href="/cartera" class="cartera">
                            <h3><i class="fas fa-wallet"></i>Mi Cartera</h3>
                        </a>
                    </div>

                    <div class="link">
                        <a href="/bibliotecas/Id={{$user['id']}}/verJuegos" class="biblioteca">
                            <h3><i class="fas fa-gamepad"></i>Biblioteca</h3>
                        </a>
                    </div>

                    <div class="link">
                        <a href="/juegos/Id={{$user['id']}}/añadirJuego" class="añadirJuego">
                            <h3><i class="fas fa-plus"></i></i>Añadir juego</h3>
                        </a>
                    </div>
                    <div class="link">
                        <a href="/bibliotecas/Id={{$user['id']}}/editarJuego" class="modificarJuego">
                            <h3><i class="fas fa-gamepad"></i>Modificar Juego</h3>
                        </a>
                        
                    </div>
                    <div class="link">
                        <a href="/" class="cerrarSesion">
                        <h3><i class="fas fa-sign-out-alt"></i>Cerrar sesión</h3>
                        </a>
                    </div>
                </div>

                <div class="pro">
<<<<<<< Updated upstream
                    <a href="/juegos" class="catalogo">
=======
                    <a href="#" class="catalogo">
>>>>>>> Stashed changes
                        <h2>Más juegos aquí</h2>
                    </a>
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
                            <p>Acción</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="./images/sackboy.png" alt="" />
                        <div class="card-info">
                            <h2>Sackboy A Great Advanture</h2>
                            <p>Aventura</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="./images/spiderman.png" alt="" />
                        <div class="card-info">
                            <h2>Spiderman Miles Morales</h2>
                            <p>Acción</p>
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