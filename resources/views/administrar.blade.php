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
                        <a href="/listaDeseos" class="listaDeseos">
                            <h3>Mostrar Juegos</h3>
                        </a>
                    </div>

                    <div class="link">
                        <img src="./images/library.png" alt="" />
                        <a href="/cartera" class="cartera">
                            <h3>Añadir Juego</h3>
                        </a>
                    </div>

                    <div class="link">
                        <img src="./images/library.png" alt="" />
                        <a href="/bibliotecas/Id={{$user['id']}}/verJuegos" class="biblioteca">
                            <h3>Editar Juego</h3>
                        </a>
                    </div>
                
                    <div class="link">
                        <img src="./images/library.png" alt="" />
                        <a href="/juegos/Id={{$user['id']}}/añadirJuego" class="añadirJuego">
                            <h3>Eliminar Juego</h3>
                        </a>
                    </div>
                </div>

                <div class="links">
                    <img src="./images/library.png" alt="" />
                    <a href="/profile" class="cartera">Volver</a>
                </div>
                <div class="pro">
                    <a href="/catalogo" class="catalogo"></a>
                </div>
            </div>

        </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div>
</body>

</html>