<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bbdd = "zapatilleate";
    $port = 3308;

    // Conexion con la BBDD
    $conn = new mysqli($servername, $username, $password, $bbdd, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `citas` WHERE fk_idUsuario = ".$_COOKIE['user_id']." ORDER BY fecha ";
    $result = $conn->query($sql);

    if(!isset($_COOKIE['user_id'])) {
        header("Location: /zapatilleate/index.php");
        exit();
    }
?>

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
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Declaración de fichero de estilos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter+Brush&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/news.css">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/login.css">
    <title>Trabajo obligatorio - Zapatilleate</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <a href="/zapatilleate/index.html" class="div-header">
            <img src="/zapatilleate/img/header.jpg" alt="imagen zapatillas" id="header-img">
            <h1>Zapatilleate</h1>
        </a>
        <nav id="header-nav">
            <ul>
                <li>
                    <a href="/zapatilleate/index.php">Inicio</a>
                </li>
                <li>
                    <a href="/zapatilleate/views/productos.php">Productos</a>
                </li>
                <li class="active">
                    <a href='/zapatilleate/views/citas.php'>Citas</a>
                </li>
                <li>
                    <a href="/zapatilleate/views/contacto.php">Contacto</a>
                </li>
            </ul>
        </nav>
        <div class='loged'>
            <form onsubmit='return logoutForm(this)'>
            <?php echo $_COOKIE['user_name'] ?>
            <input type='submit' class='boton' id='logout' value='Salir'/>
            </form>
        </div>
    </header>
    <main>
        <h1>Citas</h1>
    </main>
    <!-- FOOTER -->
    <footer>
        <div class="p-footer">
            <p>Centro comercial Lagoh, Sevilla</p>
            <p>670809010</p>
            <a href="/zapatilleate/views/legal.html" class="p-legal">Aviso legal</a>
        </div>
        <div class="div-footer">
            <img src="/zapatilleate/img/insta-icon.png" class="footer-img" alt="instagram">
            <img src="/zapatilleate/img/face-icon.png" class="footer-img" alt="facebook">
        </div>
    </footer>
    <!--Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/zapatilleate/js/validation.js"></script>
    <script src="/zapatilleate/js/login.js"></script>
</body>

</html>