<?php

include 'bbdd.php';

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