<?php
    include '../bbdd.php';

    $sql = "INSERT INTO productos (nombre, precio, imagen, idCategoria)
        VALUES ('".$_POST['nombre']."',
        '".$_POST['precio']."',
        '".$_POST['imagen']."',
        ".$_POST['categoria'].")";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva producto creada";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>



