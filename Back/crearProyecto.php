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

  $date = date('Y-m-d');

  if($_POST['selectPlazo'] == "dias"){
      
      $newdate = date('Y-m-d', strtotime($date.' + '.$_POST['plazo'].' days'));
  } else {
      $newdate = date('Y-m-d', strtotime($date.' + '.$_POST['plazo'].' months'));
  }

  $sql3 = "INSERT INTO proyectos (fk_idUsuario, fk_idProducto, nombre, color, logo, tipografia, entrega, precio)
  VALUES (".$_COOKIE["user_id"].",
  '".$_POST['elijeproducto']."',
  '".$_POST['proyecto']."',
      '".$_POST['color']."',
      '".$_POST['logo']."',
      '".$_POST['tipografia']."',
      '".$newdate."',
      ".$_POST['total'].")";

  if ($conn->query($sql3) === TRUE) {
    echo "Nuevo proyecto creado";
  } else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
  }

  $sql4 = "SELECT * FROM `proyectos` WHERE fk_idUsuario=".$_COOKIE["user_id"]." ORDER BY idProyecto DESC limit 1";
  $result4 = $conn->query($sql4);
  $idProyecto = $result4->fetch_assoc();
  
  $sql5 = "INSERT INTO citas (fk_idUsuario, fk_idProyecto, fecha, hora)
    VALUES (".$_COOKIE["user_id"].",
        ".$idProyecto['idProyecto'].",
        '".$newdate."',
        '10:00')";

        if ($conn->query($sql5) === TRUE) {
          echo "Nueva cita creada";
        } else {
          echo "Error: " . $sql5 . "<br>" . $conn->error;
        }


$conn->close();
?>


