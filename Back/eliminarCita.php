<?php
  if (!isset($_COOKIE['user_id'])) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include 'bbdd.php';
  if (!validate([$_POST['idCita']])) {
    $conn->close();
    exit();
  }

  $sql = "SELECT * FROM `citas` WHERE idCita = ".$_POST["idCita"]." and fk_idUsuario = ".$_COOKIE["user_id"];
  $result = $conn->query($sql);
  $cita = $result->fetch_assoc();

  // if fecha > now
  if ($cita['fecha'] > date('Y-m-d')) {
    $sql2 = "DELETE FROM citas WHERE idCita = ".$_POST["idCita"]." and fk_idUsuario = ".$_COOKIE["user_id"];
    if ($conn->query($sql2) === TRUE) {
      echo "Cita eliminada";
    } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
      http_response_code(500);
    }
  } else {
    echo "Error: No se puede eliminar una cita que ya ha pasado";
    http_response_code(400);
  }

  $conn->close();
?>



