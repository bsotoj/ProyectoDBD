<!DOCTYPE html>
<html>

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/administrar.style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    
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


    <div class="login-container">
        <h1>Opciones administrador</h1>
        <div class="links">
            <div class="link">
                <img src="./images/library.png" alt="" />
                <a href="/administrar/Id={{$user['id']}}/get" class="administrar">
                    <h3>Mostrar usuarios</h3>
                </a>
            </div>


            <div class="link">
                <img src="./images/library.png" alt="" />
                <a href="{{route('regiones')}}" class="administrar">
                    <h3>Crear nuevo usuario</h3>
                </a>
            </div>

            <div class="link">
                <img src="./images/library.png" alt="" />
                <a href="/administrar/Id={{$user['id']}}/editar" class="modificarUsuario">
                    <h3>Editar Usuario</h3>
                </a>
            </div>


            <div class="link">
                <img src="./images/library.png" alt="" />
                <a href="/administrar/Id={{$user['id']}}/eliminar" class="eliminarUsuario">
                    <h3>Eliminar Usuario</h3>
                </a>
            </div>


            <div class="link">
                <img src="./images/library.png" alt="" />
                <a href="/adminGames/Id={{$user['id']}}" class="listaDeseos">
                    <h3>Mostrar Juegos</h3>
                </a>
            </div>

            <div class="link">
                <img src="./images/library.png" alt="" />
                <a href="/adminGames/Id={{$user['id']}}/post" class="admin">
                    <h3>Añadir Juego</h3>
                </a>
            </div>


            <div class="link">
                <img src="./images/library.png" alt="" />
                <a href="/adminGame/editarJuego" class="admin">
                    <h3>Editar Juego</h3>
                </a>
            </div>

            <div class="link">
                <img src="./images/library.png" alt="" />
                <a href="/adminGame/Id={{$user['id']}}/delete" class="admin">
                    <h3>Eliminar Juego</h3>
                </a>
            </div>
        </div>
</body>

</html>