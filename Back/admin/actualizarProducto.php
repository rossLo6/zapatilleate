<?php
  if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include '../bbdd.php';
  if (!validate([$_POST['nombre'], $_POST['precio'], $_POST['imagen'], $_POST['categoria'], $_POST['producto_id']])) {
    $conn->close();
    exit();
  }

  $sql = "UPDATE productos SET nombre='".$_POST['nombre']."', precio='".$_POST['precio']."', imagen='".$_POST['imagen']."', idCategoria=".$_POST['categoria']." WHERE idProducto=".$_POST["producto_id"].";";

  if ($conn->query($sql) === TRUE) {
    echo "Producto editada";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>



