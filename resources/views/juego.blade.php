<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/juego2.style.css') }}" rel="stylesheet">
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

    <div class="row">
        <div class="header-content">
            <h1>Stardew Valley</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti unde esse suscipit, cumque sapiente dolorem asperiores nulla debitis aperiam corrupti magnam! Autem commodi debitis deserunt velit quos natus voluptate iusto?</p>
            <a href="#" class="wishList">Lista de deseos</a>
            <a href="#" class="cart">Carrito</a>
        </div>
        <div class="image">
            <img src="{{ asset('images/stardewValley.png')}}" alt="" width="600" height="600">
        </div>
    </div>

    <!--Detalles-->
    <section class="detalles">
        <div class="container">
            <div class="grid-wrapper">
                <div class="grid-box genero">
                    <h1>Género</h1>
                    <h3>Indie</h3>
                </div>
                <div class="grid-box almacenamiento">
                    <h1>Almacenamiento</h1>
                    <h3>500 MB</h3>
                </div>
                <div class="grid-box restricccion">
                    <h1>Edad restricción</h1>
                    <h3>Sin edad de restricción</h3>
                </div>
                <div class="grid-box desarrollador">
                    <h1>Desarrollador</h1>
                    <h3>ConcernedApe</h3>
                </div>
            </div>
            <div class="detalles-content">
                <h1>Acerca del juego</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam vel facilis eum exercitationem voluptates velit harum nobis iusto voluptatibus voluptate laudantium distinctio, ratione corporis vero reiciendis accusantium quas maiores dolores?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae modi est, magnam mollitia, possimus cupiditate, veritatis delectus harum odio quia tempora soluta porro vitae libero? Obcaecati assumenda id reprehenderit aspernatur.</p>
            </div>
        </div>
    </section>

    <section class="row-resenas">
        <div class="user-opinion">
            <table>
                <div class="contenido-resena">
                    <h1>Reseñas usuarios</h1>
                </div>
                <tr>
                    <td>Usuario</td>
                    <td>Comentario</td>
                </tr>
                <tr>
                    <td>Elizabeth</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto minus harum nobis eveniet, quia minima magnam eligendi exercitationem quae debitis nesciunt ipsa aspernatur expedita aliquam nulla, perspiciatis ex. Corrupti, eaque?</td>
                </tr>
                <tr>
                    <td>Matías</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, animi nisi? Esse hic, odio voluptatem provident harum laborum fuga iusto consectetur autem officia, nesciunt possimus a dignissimos fugit amet quisquam.</td>
                </tr>
                <tr>
                    <td>Diego</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab illo eum veritatis aliquam, minus rerum blanditiis voluptatem aspernatur. Dolorem at iure dicta inventore voluptatum ullam alias eaque vero soluta maiores.</td>
                </tr>
            </table>
        </div>
        <div class="user-like">
            <h1>Likes</h1>
            <div class="grid-wrapper">
                <div class="grid-box2 like">
                    <h2>1.245</h2>
                </div>
            </div>
        </div>
    </section>
</body>

</html>