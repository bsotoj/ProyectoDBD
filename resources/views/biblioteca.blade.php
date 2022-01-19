<!DOCTYPE html>
<html>

<head>
    <title>DEBEDE</title>
    <!--Referencia a archivo .css-->
    <link href="{{ asset('css/biblioteca.style.css') }}" rel="stylesheet">
</head>


<body>
    <main>
        <section class = "glass">
        
        <div class="dashboard">
            <div class="libreria">
                <h1>Libreria</h1>
            </div>
            <div class="usuario">
                <img src="./images/profilepic.png" alt="" />
                <p>Usuario</p>
            </div>
            <div class = "buscar">
                <h3>Buscar Juego</h3>
                <input type="text"/>
            </div>
            
        </div>
        <div class="games">
            <div class="user">
                <h2>Juegos</h2>
                @foreach($juegos as $juego)
                <div class="card">
                    <img src="./images/assassins.png" alt="" />
                    <div class="card-info">
                        <h2>{{$juego->nombreJuego}}</h2>
                        <p>{{$juego->idGenero}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div>

</body>

</html>