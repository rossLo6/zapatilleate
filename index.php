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

$sql = "SELECT * FROM `noticias` order by fecha DESC limit 5";
$result = $conn->query($sql);

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
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <link rel="stylesheet" type="text/css" href="./css/news.css">
    <title>Trabajo obligatorio - Zapatilleate</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <a href="./index.html" class="div-header">
            <img src="./img/header.jpg" alt="imagen zapatillas" id="header-img">
            <h1>Zapatilleate</h1>
        </a>
        <nav id="header-nav">
            <ul>
                <li class="active">
                    <a href="index.php">Inicio</a>
                </li>
                <li>
                    <a href="./views/productos.php">Productos</a>
                </li>
                <li>
                    <a href="./views/presupuestos.php">Regístrate</a>
                </li>
                <li>
                    <a href="./views/contacto.php">Contacto</a>
                </li>
            </ul>
        </nav>
    </header>
    <!--SECTION 1 -->
    <section class="section1">
        <h2 class="vida">EQUIPA TU ESTILO DE VIDA</h2>
        <h3 class="style-h3">Para deportistas</h3>
        <div class="img1">
            <a href="./views/productos.html#deportistas"><img src="./img/deporte.jpg" alt="imagen zapatillas deporte"></a>
        </div>
        <div class="img2">
            <a href="./views/productos.html#deportistas"><img src="./img/deporte2.jpeg" alt="imagen zapatillas deporte"></a>
        </div>
    </section>
    <div>
        <p class="parrafo1">Quisque vel tortor eget eros placerat molestie bibendum rutrum sem. Donec erat quam, scelerisque quis elit vel, ultrices molestie tortor. Pellentesque vel ex vel urna congue bibendum. Nullam varius ornare elit, ut placerat justo viverra at. Duis
            a consectetur lacus.</p>
    </div>
    <!---SECTION 2-->
    <section class="section1">
        <h3 class="style-h3">Para Aventureros</h3>
        <div class="img3">
            <a href="./views/productos.html#aventureros"><img src="./img/montaña.jpg" alt="imagen zapatillas montaña"></a>
        </div>
        <div class="img4">
            <a href="./views/productos.html#aventureros"><img src="./img/montaña2.jpg" alt="imagen zapatillas montaña"></a>
        </div>
    </section>
    <div>
        <p class="parrafo1">Vestibulum lobortis, leo a fermentum tincidunt, elit leo mattis arcu, ut cursus tellus purus sed augue. Nulla a vulputate orci. Quisque ut libero at lorem cursus mollis. Aenean dictum elit a elit laoreet sollicitudin. Proin mattis, turpis ut consectetur
            bibendum, nibh mi eleifend nisl, luctus dignissim urna turpis eu nisi. Etiam id velit vel quam euismod suscipit mollis in augue. Vestibulum ac mauris erat.</p>
    </div>
    <!--SECTION 3-->
    <section class="section1">
        <h3 class="style-h3">Para Fiesteros</h3>
        <div class="img5">
            <a href="./views/productos.html#fiesteros"><img src="./img/vestir.jpg" alt="imagen zapatillas vestir"></a>
        </div>
        <div class="img6">
            <a href="./views/productos.html#fiesteros"><img src="./img/vestir2.jpg" alt="imagen zapatillas vestir"></a>
        </div>
    </section>
    <div>
        <p class="parrafo1">Cras varius congue velit, sed varius turpis consequat non. Donec dignissim, ex nec venenatis porta, justo orci cursus nisi, vel venenatis metus est ut urna. Quisque dignissim elementum augue, lobortis aliquam neque iaculis at. Praesent facilisis
            vulputate dolor ac commodo.</p>
    </div>
    <!--SECTION NEWS-->
    <section class="section1">
        <h3 class="style-h3">Nuestras noticias</h3>

    </section>
    <div id="news-container">
        <ul class='news'>

            <?php
            //Comprobar datos y mostrarlos
                if ($result->num_rows > 0) {
                
                    while($row = $result->fetch_assoc()) {
                        echo "<li id='". $row["idNoticia"]."' class='news-item'>";
                            echo "<h3>". $row["autor"]."</h3>";
                            echo "<h4><a href='views/news.php?id=". $row["idNoticia"]."'>". $row["titulo"]."</a></h4>";
                            echo "<div class='image' style='background-image:url(\"". $row["imagen"]."\")'></div>";
                            echo "<p>". $row["cuerpo"]."</p>";
                                
                        echo "</li>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
            ?>
        </ul>
    </div>
    <!-- FOOTER -->
    <footer>
        <div class="p-footer">
            <p>Centro comercial Lagoh, Sevilla</p>
            <p>670809010</p>
            <a href="./views/legal.html" class="p-legal">Aviso legal</a>
        </div>
        <div class="div-footer">
            <img src="./img/insta-icon.png" class="footer-img" alt="instagram">
            <img src="./img/face-icon.png" class="footer-img" alt="facebook">
        </div>
    </footer>
    <!--Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>