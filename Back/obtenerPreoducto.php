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



$sql = "SELECT * FROM `productos`";
$result = $conn->query($sql);
$products = [];

if ($result->num_rows > 0) {
                
    while($row = $result->fetch_assoc()) {
        array_push($products, (object)$row);
    }
}

echo json_encode($products, JSON_PRETTY_PRINT);

$conn->close();
?>