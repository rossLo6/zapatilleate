<?php
  if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include '../bbdd.php';
  if (!validate([$_POST['idUsuario']])) {
    $conn->close();
    exit();
  }

    $sql1 = "DELETE FROM citas WHERE fk_idUsuario = ".$_POST["idUsuario"];
    $sql2 = "DELETE FROM users_login WHERE fk_idUsuario = ".$_POST["idUsuario"];
    $sql3 = "DELETE FROM users_data WHERE idUsuario = ".$_POST["idUsuario"];
    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
        echo "Usuario eliminado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        http_response_code(500);
    }

  $conn->close();
?>



