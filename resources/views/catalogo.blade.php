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
    <script src="https://kit.fontawesome.com/3a9c61ce37.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="nav">
            <img src="{{ asset('images/logo2.png')}}" alt="" class="logo">
            <a class="debede" href="#">DEBEDE</a>
            <ul class="nav-list">
                <li><a href="/carrito" class="carrito">
                        <i class="fas fa-shopping-cart"></i>Carrito</li>
                </a>
                <li><a href="/listaDeseos" class="listaDeseos">
                        <i class="far fa-heart"></i>Lista de deseos</li>
                </a>
                <li>
                    <a href="/profile" class="profile">
                        <i class="far fa-user"></i>Mi cuenta
                </li>
                </a>
            </ul>
        </div>
    </header>


    <main>
        <section class="glass">
            <div class="dashboard">

                <div class="links">
                    <form action="{{route('getGames')}}" method="GET"></form>
                    <div class="link">
                        <a href="/mejoresJuegos" class="mejoresJuegos">
                            <h3><i class="fas fa-chart-line"></i>Mejores juegos</h3>
                        </a>
                    </div>
                    </form>
                    <form action="/juegos/Id={id}/genero" method="GET">
                        <div class="link">
                            <h3><i class="fas fa-user-cog"></i>Filtrar Juego</h3>
                            <select name="id" id="id">
                                @foreach ($genero as $gen)
                                <option value="{{$gen->id}}">{{$gen->nombreGenero}}</option>
                                @endforeach
                                <input hidden type="text" class="form-control" name="id" value="{{$gen['id']}}">
                                <button type="submit"
                                    class="btn btn-success d-grid gap-2 col-2 mx-auto color3">Filtrar</button>
                            </select>
                        </div>
                    </form>
                    <div class="link">
                        <a href="/" class="cerrarSesion">
                            <h3><i class="fas fa-sign-out-alt"></i>Cerrar sesi??n</h3>
                        </a>
                    </div>
                </div>

            </div>
            <div class="games">
                

                <div class="games">
                    <div class="status">
                        <h1>C??talogo:</h1>
                        <input type="text" placeholder="Busca un juego...">
                    </div>
                    <div class="cards">
                        

                            <div class="cards">
                                @foreach($juegos as $juego)
                                <div class="card">
                                    <img src="./images/assassins.png" alt="" />
                                    <div class="card-info">
                                        <h3>{{$juego->nombreJuego}}</h3>
                                        <h3>Edad Recomendada: {{$juego->edadRestriccion}}</h3>
                                        <a href="/juego" class="btn btn-primary">
                                            <h2>Ver</h2>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
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