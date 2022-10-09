<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="NOFOLLOW" />
    <meta name="Author" content="Rosana" />
    <meta name="keywords" content="trabajo,masterd" />
    <meta name="lang" content="es" />
    <meta name="revisit-after" content="2 days" />
    <meta name="category" content="Trabajo obligatorio" />
    <!-- Llamada icono-->
    <link rel="icon" type="image/x-icon" href="/zapatilleate/favicon.ico" />
    <!-- Llamada googleFonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter+Brush&display=swap" rel="stylesheet">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Leaflet map y ruta-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <!-- Declaración de fichero de estilos -->
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/map.css">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/login.css">
    <title>Contacto</title>
</head>

<body>
    <!--  HEADER  -->
    <header>
        <a href="/zapatilleate/index.php" class="div-header">
            <img src="/zapatilleate/img/header.jpg" alt="imagen zapatillas" id="header-img">
            <h1>Zapatilleate</h1>
        </a>
        <nav id="header-nav">
            <ul>
                <li>
                    <a href="/zapatilleate/index.php">Inicio</a>
                </li>
                <li>
                    <a href="./productos.php">Productos</a>
                </li>
                <li>
                <?php
                        if(!isset($_COOKIE["user_id"])) {
                            echo "
                                <a href='/zapatilleate/views/presupuestos.php'>Presupuesto</a>
                            ";
                        } else {
                            echo "
                                <a href='/zapatilleate/views/citas.php'>Citas</a>
                            ";
                        }
                    ?>                </li>
                <li class="active">
                    <a href="./contacto.php">Contacto</a>
                </li>
            </ul>
        </nav>
        <?php
            if(!isset($_COOKIE["user_id"])) {
                echo "
                <form id='login-form' class='login' onsubmit='return loginForm(this)'>
                    <input type='text' id='usuario'>
                    <input type='password' id='password'>
                    <input type='submit' class='boton-logi' id='login' value='Entrar'/>
                </form>
                ";
            } else {
                echo "
                    <div class='loged'>
                        <form onsubmit='return logoutForm(this)'>
                        ". $_COOKIE["user_name"]."
                        <input type='submit' class='boton' id='logout' value='Salir'/>
                        </form>
                    </div>
                ";
            }
        ?>
    </header>
    <!--  MAP  -->
    <div id="map">

    </div>
    <section>
        <p class="p-map"> Nos encontramos en el centro comercial Lagoh, Sevilla</p>
        <p class="p-map">C/ Piruleta nº20</p>
        <p class="p-map">Tlf: 670809010</p>
        <h2 class="section-map2">¡OS ESPERAMOS!</h2>
    </section>
    <!--  FOOTER  -->
    <footer>
        <div class="p-footer">
            <p>Centro comercial Lagoh, Sevilla</p>
            <p>670809010</p>
            <a href="/zapatilleate/views/legal.php" class="p-legal">Aviso legal</a>
        </div>
        <div class="div-footer">
            <img src="/zapatilleate/img/insta-icon.png" class="footer-img" alt="logo instagram">
            <img src="/zapatilleate/img/face-icon.png" class="footer-img" alt="logo facebook">
        </div>
    </footer>
    <!--LeafletJS-->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <!--Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--JS -->
    <script src="/zapatilleate/js/mapa.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/zapatilleate/js/validation.js"></script>
    <script src="/zapatilleate/js/login.js"></script>
</body>

</html>