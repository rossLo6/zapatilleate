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

$sql = "INSERT INTO usuarios (fk_idRol, usuario, password, nombre, apellido1, apellido2, email, fnac, telefono)
VALUES (2,
    '".$_POST['usuario']."',
    '".$_POST['password']."',
    '".$_POST['nombre']."',
    '".$_POST['apellido1']."',
    '".$_POST['apellido2']."',
    '".$_POST['email']."',
    '".$_POST['fnac']."',
    ".$_POST['telefono'].")";

if ($conn->query($sql) === TRUE) {
  echo "Nuevo usuario creado";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql2 = "SELECT * FROM `usuarios` WHERE usuario='".$_POST['usuario']."'";
$result2 = $conn->query($sql2);
$idUsuario = $result2->fetch_assoc();

$date = date('Y-m-d');

if($_POST['medida'] == "dias"){
    
    $newdate = date('Y-m-d', strtotime($date.' + '.$_POST['cantidad'].' days'));
} else {
    $newdate = date('Y-m-d', strtotime($date.' + '.$_POST['cantidad'].' months'));
}



$sql3 = "INSERT INTO proyectos (fk_idUsuario, fk_idProducto, nombre, color, logo, tipografia, entrega, precio)
VALUES (".$idUsuario['idUsuario'].",
    ".$_POST['proyecto'].",
    '".$_POST['nombreProyecto']."',
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



$conn->close();


?>


