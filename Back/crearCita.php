<?php
  if (!isset($_COOKIE['user_id'])) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include 'bbdd.php';
  if (!validate([$_POST['proyecto'], $_POST['fecha'], $_POST['hora'], $_POST['motivo']])) {
    $conn->close();
    exit();
  }

  $sql5 = "INSERT INTO citas (fk_idUsuario, fk_idProyecto, fecha, hora, motivo)
    VALUES (".$_COOKIE["user_id"].",
        ".$_POST['proyecto'].",
        '".$_POST['fecha']."',
        '".$_POST['hora']."',
        '".$_POST['motivo']."')";

        if ($conn->query($sql5) === TRUE) {
          echo "Nueva cita creada";
        } else {
          echo "Error: " . $sql5 . "<br>" . $conn->error;
        }

  $conn->close();
?>



