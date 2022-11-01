<?php
  include 'bbdd.php';

  $sql = "UPDATE usuarios SET nombre = '".$_POST['nombre']."', apellido1 = '".$_POST['apellido1']."', apellido2 = '".$_POST['apellido2']."', email = '".$_POST['email']."', telefono = '".$_POST['telefono']."', fnac = '".$_POST['fnac']."' WHERE idUsuario = ".$_COOKIE["user_id"].";";

  if ($conn->query($sql) === TRUE) {
    echo "Usuario editado";
    setcookie("user_name", $row["nombre"]." ".$row["apellido1"]." ".$row["apellido2"], time() + (86400 * 30), "/"); // 86400 = 1 day
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>



