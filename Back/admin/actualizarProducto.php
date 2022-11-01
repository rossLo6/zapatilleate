<?php
  include '../bbdd.php';

  $sql = "UPDATE productos SET nombre='".$_POST['nombre']."', precio='".$_POST['precio']."', imagen='".$_POST['imagen']."', idCategoria=".$_POST['categoria']." WHERE idProducto=".$_POST["producto_id"].";";

  if ($conn->query($sql) === TRUE) {
    echo "Producto editada";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>



