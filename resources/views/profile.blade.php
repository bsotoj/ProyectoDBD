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
    <link href="{{ asset('css/profile3.style.css') }}" rel="stylesheet">
</head>

<body>
<header>
        <div class="nav">
            <img src="{{ asset('images/logo2.png')}}" alt="" class="logo">
            <a class="debede" href="#">DEBEDE</a>
            <ul class="nav-list">
                <li><i class="fas fa-shopping-cart"></i><a href="#">Carrito</a></li>
                <li><i class="far fa-heart"></i><a href="#">Lista de deseos</a></li>
                <li><i class="far fa-user"></i></i><a href="#">Mi cuenta</a></li>
            </ul>
        </div>
    </header>

    <main>
        <section class="glass">
            <div class="dashboard">
                <div class="user">
                    <img src="/images/profilepic.png" alt="" />
                    <h3>{{$user->nombreUsuario}}</h3>
                    <p>{{$rol->nombreRol}}</p>
                </div>
                <div class="links">
                    <div class="link">
                        <a href="/usuarios/Id={{$user['id']}}/editarPerfil" class="modificarUsuario">
                        <h3><i class="far fa-user"></i>Editar Perfil</h3>
                        </a>
                    </div>
                
                    <div class="link">
                        <a href="/administrar/Id={{$user['id']}}/admin" class="modificarUsuario">
                        <h3><i class="fas fa-user-cog"></i>Operaciones Admin</h3>
                        </a>
                    </div>
                    
                    <div class="link">
                        <a href="/carrito" class="carrito">
                            <h3><i class="fas fa-shopping-cart"></i>Carrito</h3>
                        </a>
                    </div>
                    <div class="link">

                   
                        <a href="/wishListShow/Id={{$user['id']}}" class="listaDeseos">
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
                    <a href="/wishList/Id={{$user['id']}}/e" class="usuario">
                        <h2>¡Mira nuestro catálogo!</h2>
                    </a>
                    <img src="/images/controller.png" alt="" />
                </div>
            </div>
            <div class="games">
                <div class="status">
                    <h1>Mis Juegos:</h1>
                    <input type="text" />
                </div>
                <div class="cards">
                    <div class="card">
                        <img src="/images/assassins.png" alt="" />
                        <div class="card-info">
                            <h2>Assassins Creed Valhalla</h2>
                            <h3>Edad Recomendada: 15</h3>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/images/sackboy.png" alt="" />
                        <div class="card-info">
                            <h2>Sackboy A Great Advanture</h2>
                            <h3>Edad Recomendada: 18</h3>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/images/spiderman.png" alt="" />
                        <div class="card-info">
                            <h2>Spiderman Miles Morales</h2>
                            <h3>Edad Recomendada: 12</h3>
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