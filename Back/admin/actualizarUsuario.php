<?php
  if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include '../bbdd.php';
  if (!validate([$_POST['nombre'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['telefono'], $_POST['fnac'], $_POST['direccion'], $_POST['sexo'], $_POST['user_id']])) {
    $conn->close();
    exit();
  }

  $sql = "UPDATE users_data SET nombre = '".$_POST['nombre']."', apellidos = '".$_POST['apellidos']."', email = '".$_POST['email']."', telefono = '".$_POST['telefono']."', fnac = '".$_POST['fnac']."', direccion = '".$_POST['direccion']."', sexo = '".$_POST['sexo']."' WHERE idUsuario = ".$_POST["user_id"].";";

  if ($conn->query($sql) === TRUE) {
    echo "Usuario editado";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $sql2 = "UPDATE users_login SET fk_idRol = ".$_POST['rol']." WHERE fk_idUsuario = ".$_POST["user_id"].";";

  if ($conn->query($sql2) === TRUE) {
    echo "Usuario editado";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>



