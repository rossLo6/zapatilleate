<?php
    include '../bbdd.php';

    $sql = "INSERT INTO noticias (autor, titulo, cuerpo, imagen, fk_idCategoria)
        VALUES ('".$_POST['autor']."',
        '".$_POST['titulo']."',
        '".$_POST['cuerpo']."',
        '".$_POST['imagen']."',
        ".$_POST['categoria'].")";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva noticia creada";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>



