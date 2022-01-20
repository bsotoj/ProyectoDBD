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
    <main>
        <section class="glass">
            <div class="games">
                <div class="status">
                    <h1>Usuarios en la plataforma:</h1>
                </div>
                <div class="cards">
                    @foreach($usuarios as $usuario)
                    <div class="card">
                        <div class="card-info">
                            <h2>{{$usuario->nombreUsuario}}</h2>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="links">
                    <a href='/redirigirPerfil/Id={{$admin['id']}}' class="profile">
                        <h3><i class="far fa-user"></i>Volver al perfil</h3>
                    </a>
                </div>
        </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div>
</body>

</html>