<?php
  if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include '../bbdd.php';
  if (!validate([$_POST['idProducto'], $_POST['nombre'], $_POST['color'], $_POST['logo'], $_POST['tipografia'], $_POST['entrega'], $_POST['precio'], $_POST['idProyecto']])) {
    $conn->close();
    exit();
  }

  $sql = "UPDATE proyectos SET 
      fk_idProducto = ".$_POST['idProducto'].",
      nombre = '".$_POST['nombre']."',
      color = ".$_POST['color'].",
      logo = ".$_POST['logo'].",
      tipografia = ".$_POST['tipografia'].",
      entrega = '".$_POST['entrega']."',
      precio = ".$_POST['precio']."
    WHERE idProyecto = ".$_POST["idProyecto"].";";

  if ($conn->query($sql) === TRUE) {
    echo "Proyecto editado";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>



