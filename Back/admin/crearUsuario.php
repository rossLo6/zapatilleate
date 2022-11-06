<?php
  if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include '../bbdd.php';
  if (!validate([$_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['telefono'], $_POST['fnac'], $_POST['direccion'], $_POST['sexo'], $_POST['usuario'], $_POST['password']])) {
    $conn->close();
    exit();
  }

  $sql = "INSERT INTO users_data (nombre, apellidos, email, telefono, fnac, direccion, sexo)
    VALUES ('".$_POST["nombre"]."',
        '".$_POST['apellidos']."',
        '".$_POST['email']."',
        '".$_POST['telefono']."',
        '".$_POST['fnac']."',
        '".$_POST['direccion']."',
        '".$_POST['sexo']."')";

  if ($conn->query($sql) === TRUE) {
    echo "Usuario editado";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    http_response_code(500);
  }

  $sql2 = "SELECT * FROM `users_data` WHERE email='".$_POST['email']."'";
  $result2 = $conn->query($sql2);
  $idUsuario = $result2->fetch_assoc();

  $sqlLogin = "INSERT INTO users_login (fk_idUsuario, fk_idRol, usuario, password)
    VALUES (
      ".$idUsuario['idUsuario'].",
      2,
      '".$_POST['usuario']."',
      '".hash('sha256', $_POST['password'])."')";


  if ($conn->query($sqlLogin) === TRUE) {
    echo "Nuevo usuario creado";
  } else {
    echo "Error: " . $sqlLogin . "<br>" . $conn->error;
    http_response_code(500);
  }

  $conn->close();
?>



