<?php

  include 'bbdd.php';

  $sql5 = "INSERT INTO citas (fk_idUsuario, fk_idProyecto, fecha, hora)
    VALUES (".$_COOKIE["user_id"].",
        ".$_POST['proyecto'].",
        '".$_POST['fecha']."',
        '".$_POST['hora']."')";

        if ($conn->query($sql5) === TRUE) {
          echo "Nueva cita creada";
        } else {
          echo "Error: " . $sql5 . "<br>" . $conn->error;
        }

  $conn->close();
?>



