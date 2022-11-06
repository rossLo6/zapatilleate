<?php
  if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include '../bbdd.php';
  if (!validate([$_POST['idNoticia']])) {
    $conn->close();
    exit();
  }

    $sql = "DELETE FROM noticias WHERE idNoticia = ".$_POST["idNoticia"];
    if ($conn->query($sql) === TRUE) {
        echo "Noticia eliminada";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        http_response_code(500);
    }

  $conn->close();
?>



