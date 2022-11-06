<?php
    include '../Back/bbdd.php';
    $id=$_GET['id'];
    $sql = "SELECT noticias.*, users_data.nombre as autor, categorias.nombre as categoria  FROM `noticias` INNER JOIN `users_data` on noticias.fk_idUsuario = users_data.idUsuario INNER JOIN `categorias` ON categorias.idCategoria = noticias.fk_idCategoria WHERE idNoticia=".$id;
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
        <div class="news-detail">
            <h1><?php echo $new["categoria"];?></h1>
            <h2><?php echo $new["titulo"];?></h2>
            <div class='image' style='background-image:url(<?php echo $new["imagen"];?>)'></div>
            <p><?php echo $new["cuerpo"];?></p>
            <h3><?php echo $new["autor"];?></h3>
        </div>
    </main>
    <!--Footer-->
    <?php include 'footer.php';?>
</body>

</html>