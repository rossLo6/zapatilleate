<?php
  if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include '../bbdd.php';
  if (!validate([$_POST['idCita']])) {
    $conn->close();
    exit();
  }

    $sql = "DELETE FROM citas WHERE idCita = ".$_POST["idCita"];
    if ($conn->query($sql) === TRUE) {
        echo "Cita eliminada";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        http_response_code(500);
    }

  $conn->close();
?>



