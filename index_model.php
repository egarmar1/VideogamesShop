<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Videogame shop</title>
        <link rel="stylesheet" href="assets/css/style.css"
              <title></title>
    </head>
    <body>
        <div id="container">
            <!-- HEADER -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/logo.png" alt='Imagen logo'/>
                    <a href='#'>Videogame shop</a>
                </div>
            </header>

            <!--MENU-->

            <nav id='menu'>
                <ul>
                    <li>
                        <a href='#'>Inicio</a>
                    </li>
                    <li>
                        <a href='#'>Categoria 2</a>
                    </li>
                    <li>
                        <a href='#'>Categoria 3</a>
                    </li>
                    <li>
                        <a href='#'>Categoria 4</a>
                    </li>
                    <li>
                        <a href='#'>Categoria 5</a>
                    </li>
                    <li>
                        <a href='#'>Categoria 6</a>
                    </li>
                </ul>

            </nav>
            <div id='content'>

                <!--SIDEBAR-->
                <aside id='lateral'>
                    <div id='login' class='block_aside'>
                        <h3>Login</h3>
                        <form action='#' method='post'>
                            <label for='username'>Username</label>
                            <input type='text' name='username'/>

                            <label for='password'>Password</label>
                            <input type='text' name='password'/>


                            <input type='submit' name='Login' value="Login"/>
                        </form>
                        <ul>
                            <li><a href='#'>Favoritos</a></li>
                            <li><a href='#'>Mi carrito</a></li>
                            <li><a href='#'>Mis pedidos</a></li>
                        </ul>


                    </div>
                </aside>
                <!--CORE CONTENT-->
                <div id='core'>
                    <h1>Videojuegos famosos</h1>
                    <div class='product'>
                        <img src='assets/img/defaultVideogame.png'>
                        <h2>Videojuego play4</h2>
                        <p>30 euros</p>
                        <a href="" class="button button_small">Comprar</a>
                    </div>
                    <div class='product'>
                        <img src='assets/img/defaultVideogame.png'>
                        <h2>Videojuego play4</h2>
                        <p>30 euros</p>
                        <a href="" class="button button_small">Comprar</a>
                    </div>
                    <div class='product'>
                        <img src='assets/img/defaultVideogame.png'>
                        <h2>Videojuego play4</h2>
                        <p>30 euros</p>
                        <a href="" class="button button_small">Comprar</a>
                    </div>
                </div>

            </div>
            <!--FOOTER-->
            <footer id='footer'>
                <p>Realizado por Enrique García Mármol &COPY; <?=date('Y')?></p>
            </footer>

        </div>

    </body>
</html>
