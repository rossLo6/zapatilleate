<?php
  include '../bbdd.php';

  $sql = "UPDATE noticias SET autor='".$_POST['autor']."', titulo='".$_POST['titulo']."', cuerpo='".$_POST['cuerpo']."', imagen='".$_POST['imagen']."', fk_idCategoria=".$_POST['categoria']." WHERE idNoticia=".$_POST["noticia_id"].";";

  if ($conn->query($sql) === TRUE) {
    echo "Noticia editada";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>



