<?php
    if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
        echo "Error: No tienes permisos para acceder a esta página";
        http_response_code(403);
        exit();
    }
    include '../bbdd.php';
    if (!validate([$_POST['nombre'], $_POST['precio'], $_POST['imagen'], $_POST['categoria']])) {
        $conn->close();
        exit();
      }

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



