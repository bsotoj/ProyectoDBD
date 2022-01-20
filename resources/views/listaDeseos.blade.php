<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link href="{{ asset('css/listaDeseos2.style.css') }}" rel="stylesheet">
    <!-- FontAwesome-->
    <script src="https://kit.fontawesome.com/3a9c61ce37.js" crossorigin="anonymous"></script>
    <title>DEBEDE</title>
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

    <div class="small-container cart-page">
        <h1>Mi lista de deseos</h1>
        <table>
            <tr>
                <th>#</th>
                <th>Nombre juego</th>
                <th>Género</th>
                <th>Precio</th>
            </tr>

            <tr>
                <td>1</td>
                <td>Stardew Valley</td>
                <td>leBon</td>
                <td>10.000</td>
            </tr>

            <tr>
                <td>2</td>
                <td>Sims 4</td>
                <td>Duppont</td>
                <td>25.000</td>
            </tr>

            <tr>
                <td>3</td>
                <td>DOOM Eternal</td>
                <td>leBon</td>
                <td>22.000</td>
            </tr>
        </table>
    </div>
</body>

</html>