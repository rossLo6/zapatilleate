<?php
  if (!isset($_COOKIE['user_id'])) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include 'bbdd.php';
  if (!validate([$_POST['fecha'], $_POST['hora'], $_POST['motivo'], $_POST['idCita']])) {
    $conn->close();
    exit();
  }

  $sql = "UPDATE citas SET fecha = '".$_POST['fecha']."', hora = '".$_POST['hora']."', motivo = '".$_POST['motivo']."' WHERE idCita = ".$_POST['idCita'].";";

  if ($conn->query($sql) === TRUE) {
    echo "Cita editada";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>



