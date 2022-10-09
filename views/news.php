<?php
$servername = "localhost";
$username = "root";
$password = "";
$bbdd = "zapatilleate";
$port = 3308;

// Create connection
$conn = new mysqli($servername, $username, $password, $bbdd, $port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id=$_GET['id'];
$sql = "SELECT * FROM `noticias` WHERE idNoticia=".$id;
$result = $conn->query($sql);
$new = $result->fetch_assoc()
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
    <link rel="icon" type="image/x-icon" href="/zapatilleate/favicon.ico" />
    <!-- Llamada googleFonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter+Brush&display=swap" rel="stylesheet">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Declaración de fichero de estilos -->
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/news.css">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/login.css">
    <title>
        <?php
        echo $new['titulo'];
    ?> 
    </title>
</head>

<body>
    <header>
        <a href="/zapatilleate/index.php" class="div-header">
            <img src="/zapatilleate/img/header.jpg" alt="imagen zapatillas" id="header-img">
            <h1>Zapatilleate</h1>
        </a>
        <nav id="header-nav">
            <ul>
                <li class="active">
                    <a href="/zapatilleate/index.php">Inicio</a>
                </li>
                <li>
                    <a href="./productos.php">Productos</a>
                </li>
                <li>
                <?php
                        if(!isset($_COOKIE[$cookie_name])) {
                            echo "
                                <a href='./views/presupuestos.php'>Presupuesto</a>
                            ";
                        } else {
                            echo "
                                <a href='./views/citas.php'>Citas</a>
                            ";
                        }
                    ?>                </li>
                <li>
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


    <main>
        <div class="news-detail">
        <h1><?php echo $new["autor"];?></h1>
            <h2><?php echo $new["titulo"];?></h2>
            <div class='image' style='background-image:url(<?php echo $new["imagen"];?>)'></div>
            <p><?php echo $new["cuerpo"];?></p>
        </div>
        

    </main>



    <footer>
        <div class="p-footer">
            <p>Centro comercial Lagoh, Sevilla</p>
            <p>670809010</p>
            <a href="/zapatilleate/views/legal.php" class="p-legal">Aviso legal</a>
        </div>
        <div class="div-footer">
            <img src="/zapatilleate/img/insta-icon.png" class="footer-img" alt="instagram">
            <img src="/zapatilleate/img/face-icon.png" class="footer-img" alt="facebook">
        </div>
    </footer>
    <!--Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/zapatilleate/js/validation.js"></script>
    <script src="/zapatilleate/js/login.js"></script>
</body>

</html>