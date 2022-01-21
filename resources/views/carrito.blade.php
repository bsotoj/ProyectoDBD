<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link href="{{ asset('css/carrito4.style.css') }}" rel="stylesheet">
    <!-- FontAwesome-->
    <script src="https://kit.fontawesome.com/3a9c61ce37.js" crossorigin="anonymous"></script>
    <title>DEBEDE</title>
</head>

<body>
    <header>
        <div class="nav">
            <img src="{{ asset('images/logo2.png')}}" alt="" class="logo">
            <a class="debede" href="#">DEBEDE</a>
        </div>
    </header>

    <div class="small-container cart-page">
        <h1>Mi carrito</h1>
        <table>
            <tr>
                <th>#</th>
                <th>Nombre juego</th>
                <th>Género</th>
                <th>Precio</th>
                <th>Opciones</th>
            </tr>

            <tr>
                <td>1</td>
                <td>Stardew Valley</td>
                <td>leBon</td>
                <td>10.000</td>
                <td>
                    <div class="opciones">
                        <a href="#">
                            <h3>Quitar de la lista de deseos</h3>
                        </a>
                        <a href="#">
                            <h3>Añadir al carrito</h3>
                        </a>
                    </div>
                </td>
            </tr>

            <tr>
                <td>2</td>
                <td>Sims 4</td>
                <td>Duppont</td>
                <td>25.000</td>
                <td>
                    <div class="opciones">
                        <a href="#">
                            <h3>Quitar de la lista de deseos</h3>
                        </a>
                        <a href="#">
                            <h3>Añadir al carrito</h3>
                        </a>
                    </div>
                </td>
            </tr>

            <tr>
                <td>3</td>
                <td>DOOM Eternal</td>
                <td>leBon</td>
                <td>22.000</td>
                <td>
                    <div class="opciones">
                        <a href="#">
                            <h3>Quitar de la lista de deseos</h3>
                        </a>
                        <a href="#">
                            <h3>Añadir al carrito</h3>
                        </a>
                    </div>
                </td>
            </tr>
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>100.000</td>
                </tr>
                <tr>
                    <td>Impuestos</td>
                    <td>10.000</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>110.000</td>
                </tr>
            </table>
        </div>
        <input type="submit" value="Pagar">
    </div>
</body>

</html>