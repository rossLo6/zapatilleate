<?php
  if (!isset($_COOKIE['user_id'])) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include 'bbdd.php';
  if (!validate([$_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['telefono'], $_POST['fnac'], $_POST['direccion'], $_POST['sexo']])) {
    $conn->close();
    exit();
  }

  $sql = "UPDATE users_data SET
      nombre = '".$_POST['nombre']."',
      apellidos = '".$_POST['apellidos']."',
      email = '".$_POST['email']."',
      telefono = '".$_POST['telefono']."',
      fnac = '".$_POST['fnac']."',
      direccion = '".$_POST['direccion']."',
      sexo = '".$_POST['sexo']."'
    WHERE idUsuario = ".$_COOKIE["user_id"].";";

  if ($conn->query($sql) === TRUE) {
    echo "Usuario editado";
    setcookie("user_name", $_POST["nombre"]." ".$_POST["apellidos"], time() + (86400 * 30), "/"); // 86400 = 1 day
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    http_response_code(500);
  }

  if (isset($_POST['password']) && $_POST['password'] != "") {
    $sql = "UPDATE users_login SET
        password = '".hash('sha256', $_POST['password'])."'
      WHERE fk_idUsuario = ".$_COOKIE["user_id"].";";

    if ($conn->query($sql) === TRUE) {
      echo "Contraseña editada";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      http_response_code(500);
    }
  }

  $conn->close();
?>



