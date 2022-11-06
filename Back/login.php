<?php
  include 'bbdd.php';
  if (!validate([$_POST['usuario'], $_POST['password']])) {
    $conn->close();
    exit();
  }

  $sql = "SELECT * FROM `users_login` where usuario = '".$_POST['usuario']."' and password = '".hash('sha256', $_POST['password'])."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sql2 = "SELECT * FROM `users_data` where idUsuario = ".$row['fk_idUsuario'];
    $result2 = $conn->query($sql2);
    $usuario = $result2->fetch_assoc();

    setcookie("user_name", $usuario["nombre"]." ".$usuario["apellidos"], time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("user_user", $row["usuario"], time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("user_id", $usuario["idUsuario"], time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("user_email", $usuario["email"], time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("user_rol", $row["fk_idRol"], time() + (86400 * 30), "/"); // 86400 = 1 day
  } else {
    http_response_code(404);
  }

  $conn->close();
?>