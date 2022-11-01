<?php
  include '../bbdd.php';

  $sql = "UPDATE usuarios SET nombre = '".$_POST['nombre']."', apellido1 = '".$_POST['apellido1']."', apellido2 = '".$_POST['apellido2']."', email = '".$_POST['email']."', telefono = '".$_POST['telefono']."', fnac = '".$_POST['fnac']."' WHERE idUsuario = ".$_POST["user_id"].";";

  if ($conn->query($sql) === TRUE) {
    echo "Usuario editado";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>



