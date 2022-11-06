<?php
  include 'bbdd.php';
  if (!validate([$_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['fnac'], $_POST['telefono'], $_POST['direccion'], $_POST['sexo'], $_POST['usuario'], $_POST['password'],
    $_POST['proyecto'], $_POST['nombreProyecto'], $_POST['color'], $_POST['logo'], $_POST['tipografia'], $_POST['total'], $_POST['motivo']])
  ) {
    $conn->close();
    exit();
  }

$sqlLogin = "SELECT * FROM `users_login` where usuario = '".$_POST['usuario']."'";
$result = $conn->query($sqlLogin);

if ($result->num_rows > 0) {
  http_response_code(300);
} else {
  $sql = "INSERT INTO users_data (nombre, apellidos, email, fnac, telefono, direccion, sexo)
  VALUES (
      '".$_POST['nombre']."',
      '".$_POST['apellidos']."',
      '".$_POST['email']."',
      '".$_POST['fnac']."',
      ".$_POST['telefono'].",
      '".$_POST['direccion']."',
      '".$_POST['sexo']."')";

  if ($conn->query($sql) === TRUE) {
    echo "Nuevo usuario creado";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $sql2 = "SELECT * FROM `users_data` WHERE email='".$_POST['email']."'";
  $result2 = $conn->query($sql2);
  $idUsuario = $result2->fetch_assoc();

  $sqlLogin = "INSERT INTO users_login (fk_idUsuario, fk_idRol, usuario, password)
    VALUES (
      ".$idUsuario['idUsuario'].",
      2,
      '".$_POST['usuario']."',
      '".hash('sha256', $_POST['password'])."')";


  if ($conn->query($sqlLogin) === TRUE) {
    echo "Nuevo usuario creado";
  } else {
    echo "Error: " . $sqlLogin . "<br>" . $conn->error;
  }

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

  $sql4 = "SELECT * FROM `proyectos` WHERE fk_idUsuario=".$idUsuario['idUsuario'];
  $result4 = $conn->query($sql4);
  $idProyecto = $result4->fetch_assoc();
  
  $sql5 = "INSERT INTO citas (fk_idUsuario, fk_idProyecto, fecha, hora, motivo)
    VALUES (".$idUsuario['idUsuario'].",
        ".$idProyecto['idProyecto'].",
        '".$newdate."',
        '10:00'),
        ".$_POST['motivo'].")";

        if ($conn->query($sql5) === TRUE) {
          echo "Nueva cita creada";
        } else {
          echo "Error: " . $sql5 . "<br>" . $conn->error;
        }
}






$conn->close();


?>



