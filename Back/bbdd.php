<?php
    $servername = "localhost";
    $username = "root";
    $password = "P4ssw0rd"; // "" for windows
    $bbdd = "zapatilleate";
    $port = 3306; // 3308 for windows

    // Conexion con la BBDD
    $conn = new mysqli($servername, $username, $password, $bbdd, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // function for validate parameter array
    function validate($array){
        foreach($array as $key => $value){
            if(!isset($value) || $value == ""){
                echo "Error: No se han recibido todos los datos";
                http_response_code(400);
                return false;
            }
        }
        return true;
    }
?>