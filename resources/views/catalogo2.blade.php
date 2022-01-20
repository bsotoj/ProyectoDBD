<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEBEDE</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/catalogo.style.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <section class="glass">
            <div class="games">
                <div class="status">
                    <h1>Cátalogo:</h1>
                    <input type="text" />
                </div>
                <div class="cards">
                    @foreach($juegos as $juego)
                    <div class="card">
                        <img src="./images/assassins.png" alt="" />
                        <div class="card-info">
                            <h2>{{$juego->nombreJuego}}</h2>
                            <p>{{$juego->idGenero}}</p>
                            <a href="/wishList/userID/{{$user['id']}}/gameID/{{$juego['id']}}" class="btn btn-primary">Ver</a>
                    </div>
                    @endforeach

                </div>
        </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div>
</body>

</html>