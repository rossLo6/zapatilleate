<?php
  include 'bbdd.php';

  $sql = "UPDATE citas SET fecha = '".$_POST['fecha']."', hora = '".$_POST['hora']."' WHERE idCita = ".$_POST['idCita'].";";

  if ($conn->query($sql) === TRUE) {
    echo "Cita editada";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>



