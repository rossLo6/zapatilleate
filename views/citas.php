<?php

if(!isset($_COOKIE['user_id'])) {
    header("Location: /zapatilleate/index.php");
    exit();
}
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bbdd = "zapatilleate";
    $port = 3308;

    // Conexion con la BBDD
    //mostrar citas
    $conn = new mysqli($servername, $username, $password, $bbdd, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `citas` INNER JOIN `proyectos` ON fk_idProyecto = idProyecto WHERE citas.fk_idUsuario = ".$_COOKIE['user_id']." ORDER BY fecha ";
    $result = $conn->query($sql);

    //pedir nueva cita de proyecto ya creado
    $sql2 = "SELECT * FROM `proyectos` WHERE fk_idUsuario = ".$_COOKIE['user_id']."";
    $result2 = $conn->query($sql2);

    //crear un proyecto nuevo
    $sql3 = "SELECT * FROM `productos`";
    $result3 = $conn->query($sql3);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="NOFOLLOW" />
    <meta name="Author" content="Rosana" />
    <meta name="keywords" content="trabajo,masterd" />
    <meta name="lang" content="es" />
    <meta name="revisit-after" content="2 days" />
    <meta name="category" content="Trabajo obligatorio" />
    <!-- Llamada icono-->
    <link rel="icon" type="image/x-icon" href="/zapatilleate/favicon.ico" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Declaración de fichero de estilos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter+Brush&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/news.css">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/login.css">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/citas.css">
    <title>Trabajo obligatorio - Zapatilleate</title>
</head>

<body>
    <!-- HEADER -->
    <?php include 'header.php';?>
    <main>
    <div class="divtabla">
        <h1>Mis Citas</h1>   
<table class="tabla">

<tr>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Proyecto</th>
    <th>Editar</th>
  </tr>
  <?php
            //Comprobar datos y mostrarlos
                if ($result->num_rows > 0) {
                
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>". $row["fecha"]."</td>";
                        echo "<td>". $row["hora"]."</td>";
                            echo "<td>". $row["nombre"]."</td>";
                                
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
            ?>
</table>
</div>
<h2>Pedir nueva cita:</h2>
    <form id="form2" onsubmit="return validarcita(this)">
    <fieldset>
    <label for="citaproyecto" class="label">Selecciona el proyecto y la fecha y hora para tu nueva cita:</label>
    <select name="nuevacita" id="citaproyecto" class="cuadros">
    <?php
    if ($result2->num_rows > 0) {
                
                while($row = $result2->fetch_assoc()) {
                    echo "<option value='". $row['idProyecto']."'>". $row['nombre']."</option>";
                        
                }
            }
            $conn->close();
        ?>
        </select>
        <label for="newdate"></label>
        <input
        id="newdate"
        type="datetime-local"
        name="nuevafecha" class="cuadros"/>
        </fieldset>
        <fieldset>
                <input type="reset" value="Borrar todo" class="boton" id="boton1" />
                <input type="submit" class="boton" id="boton2" />
            </fieldset>
 </form>

 <h2>Crear nuevo proyecto:</h2>
 <form id="form2" onsubmit="return validarproyecto(this)">
    <fieldset>
                <label for="name" class="label">Proyecto:</label>
                <input id="nombreProyecto" name="name" type="text" class="cuadros" placeholder="Elige el nombre de tu proyecto" required/>
                <label for="elijeProducto" class="label">Elije tus zapatillas:</label>
                <select name="elije" id="elijeProducto" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <?php
            //Comprobar datos y mostrarlos
                if ($result3->num_rows > 0) {
                
                    while($row = $result3->fetch_assoc()) {
                        echo "<option value='". $row['idProducto']."'>". $row['nombre']."</option>";
                            
                    }
                }
                $conn->close();
            ?>
                </select>

                <label for="plazo" class="label">Cuando desea recivir su pedido:</label>
                <input type="number" id="plazo" max="20" min="3" value="3" required/>
                <select name="elije" id="selectPlazo">
                    <option value="dias">Días</option>
                    <option value="meses">Meses</option>
                </select>
                <div>
                    <label class="label">Personalice sus extras: </label>

                    <label for="personalizado1">Color personalizado: </label>
                    <input type="checkbox" class="customcheck" id="personalizado1" value="6" />
                    <label for="personalizado2">Logo personalizado: </label>
                    <input type="checkbox" id="personalizado2" class="customcheck" value="5" />
                    <label for="personalizado3">Pon tu nombre: </label>
                    <input type="checkbox" id="personalizado3" class="customcheck" value="2" />
                </div>
                <label for="total" class="label">Presupuesto final: </label>
                <input id="total" name="name" type="text" class="cuadros" disabled />
            </fieldset>
            <!-- envio formulario -->
            <fieldset>
                <input type="reset" value="Borrar todo" class="boton" id="boton1" />
                <input type="submit" class="boton" id="boton2" />
            </fieldset>
                </form>
    </main>
    <!-- FOOTER -->
    <?php include 'footer.php';?>
    <script src="/zapatilleate/js/nuevaCitaProyecto.js"></script>
    <script src="/zapatilleate/js/presupuesto.js"></script>
    
</body>

</html>