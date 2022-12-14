<?php
    include 'Back/bbdd.php';
    //require_once(dirname(__FILE__) . '/zapatilleate/Back/bbdd.php');

    $sql = "SELECT noticias.*, users_data.nombre as autor, categorias.nombre as categoria  FROM `noticias` INNER JOIN `users_data` on noticias.fk_idUsuario = users_data.idUsuario INNER JOIN `categorias` ON categorias.idCategoria = noticias.fk_idCategoria order by fecha DESC limit 5";
    $result = $conn->query($sql);

    $cookie_name = "user_name";
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
    <?php include 'views/header.php';?>
    <!--SECTION 1 -->
    <section class="section1">
        <h2 class="vida">EQUIPA TU ESTILO DE VIDA</h2>
        <h3 class="style-h3">Para deportistas</h3>
        <div class="img1">
            <a href="/zapatilleate/views/productos.html#deportistas"><img src="/zapatilleate/img/deporte.jpg" alt="imagen zapatillas deporte"></a>
        </div>
        <div class="img2">
            <a href="/zapatilleate/views/productos.html#deportistas"><img src="/zapatilleate/img/deporte2.jpeg" alt="imagen zapatillas deporte"></a>
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
            <a href="/zapatilleate/views/productos.html#aventureros"><img src="/zapatilleate/img/montaña.jpg" alt="imagen zapatillas montaña"></a>
        </div>
        <div class="img4">
            <a href="/zapatilleate/views/productos.html#aventureros"><img src="/zapatilleate/img/montaña2.jpg" alt="imagen zapatillas montaña"></a>
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
            <a href="/zapatilleate/views/productos.html#fiesteros"><img src="/zapatilleate/img/vestir.jpg" alt="imagen zapatillas vestir"></a>
        </div>
        <div class="img6">
            <a href="/zapatilleate/views/productos.html#fiesteros"><img src="/zapatilleate/img/vestir2.jpg" alt="imagen zapatillas vestir"></a>
        </div>
    </section>
    <div>
        <p class="parrafo1">Cras varius congue velit, sed varius turpis consequat non. Donec dignissim, ex nec venenatis porta, justo orci cursus nisi, vel venenatis metus est ut urna. Quisque dignissim elementum augue, lobortis aliquam neque iaculis at. Praesent facilisis
            vulputate dolor ac commodo.</p>
    </div>
    <!--SECTION NEWS-->
    <section class="section1">
        <h3 class="style-h3">Ultimas noticias</h3>

    </section>
    <div id="news-container">
        <ul class='news'>

            <?php
            //Comprobar datos y mostrarlos
                if ($result->num_rows > 0) {
                
                    while($row = $result->fetch_assoc()) {
                        echo "<li id='". $row["idNoticia"]."' class='news-item'>";
                        echo "<h3>". $row["categoria"]."</h3>";
                        echo "<h4><a href='views/noticia-detalle.php?id=". $row["idNoticia"]."'>". $row["titulo"]."</a></h4>";
                        echo "<div class='image' style='background-image:url(\"". $row["imagen"]."\")'></div>";
                        echo "<p>". $row["cuerpo"]."</p>";
                        echo "<h5>". $row["autor"]."</h5>";
                                
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
    <?php include 'views/footer.php';?>
</body>

</html>