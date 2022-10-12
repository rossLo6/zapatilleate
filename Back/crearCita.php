<?php

$servername = "localhost";
$username = "root";
$password = "";
$bbdd = "zapatilleate";
$port = 3308;

// Conexion con la BBDD
$conn = new mysqli($servername, $username, $password, $bbdd, $port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
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



