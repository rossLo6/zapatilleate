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

$sql = "SELECT * FROM `usuarios` where usuario = '".$_POST['usuario']."' and password = '".hash('sha256', $_POST['password'])."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  setcookie("user_name", $row["nombre"]." ".$row["apellido1"]." ".$row["apellido2"], time() + (86400 * 30), "/"); // 86400 = 1 day
  setcookie("user_user", $row["usuario"], time() + (86400 * 30), "/"); // 86400 = 1 day
  setcookie("user_id", $row["idUsuario"], time() + (86400 * 30), "/"); // 86400 = 1 day
  setcookie("user_email", $row["email"], time() + (86400 * 30), "/"); // 86400 = 1 day
  setcookie("user_rol", $row["fk_idRol"], time() + (86400 * 30), "/"); // 86400 = 1 day
} else {
  http_response_code(404);
}

$conn->close();
?>