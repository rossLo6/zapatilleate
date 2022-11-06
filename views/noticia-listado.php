<?php
    include '../Back/bbdd.php';
    $sql = "SELECT noticias.*, users_data.nombre as autor, categorias.nombre as categoria  FROM `noticias` INNER JOIN `users_data` on noticias.fk_idUsuario = users_data.idUsuario INNER JOIN `categorias` ON categorias.idCategoria = noticias.fk_idCategoria ORDER BY noticias.fecha DESC";
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
    <!-- Header -->
<?php include 'header.php';?>
    <main>
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
    </main>
    <!--Footer-->
    <?php include 'footer.php';?>
</body>

</html>