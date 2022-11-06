<?php
  if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
    echo "Error: No tienes permisos para acceder a esta página";
    http_response_code(403);
    exit();
  }
  include '../bbdd.php';
  if (!validate([$_POST['titulo'], $_POST['cuerpo'], $_POST['imagen'], $_POST['categoria'], $_POST['noticia_id']])) {
    $conn->close();
    exit();
  }

  $sql = "UPDATE noticias SET titulo='".$_POST['titulo']."', cuerpo='".$_POST['cuerpo']."', imagen='".$_POST['imagen']."', fk_idCategoria=".$_POST['categoria']." WHERE idNoticia=".$_POST["noticia_id"].";";

  if ($conn->query($sql) === TRUE) {
    echo "Noticia editada";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>



