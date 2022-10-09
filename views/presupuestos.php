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
    <!-- Llamada googleFonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter+Brush&display=swap" rel="stylesheet">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Declaración de fichero de estilos -->
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/login.css">
    <title>Pídeme</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <a href="/zapatilleate/index.php" class="div-header">
            <img src="/zapatilleate/img/header.jpg" alt="imagen zapatillas" id="header-img">
            <h1>Zapatilleate</h1>
        </a>
        <nav id="header-nav">
            <ul>
                <li>
                    <a href="/zapatilleate/index.php">Inicio</a>
                </li>
                <li>
                    <a href="./productos.php">Productos</a>
                </li>
                <li class="active">
                    <a href="./presupuestos.php">Regístrate</a>
                </li>
                <li>
                    <a href="./contacto.php">Contacto</a>
                </li>
            </ul>
        </nav>
        <?php
            if(!isset($_COOKIE["user_id"])) {
                echo "
                <form id='login-form' class='login' onsubmit='return loginForm(this)'>
                    <input type='text' id='usuario'>
                    <input type='password' id='password'>
                    <input type='submit' class='boton-logi' id='login' value='Entrar'/>
                </form>
                ";
            } else {
                echo "
                    <div class='loged'>
                        <form onsubmit='return logoutForm(this)'>
                        ". $_COOKIE["user_name"]."
                        <input type='submit' class='boton' id='logout' value='Salir'/>
                        </form>
                    </div>
                ";
            }
        ?>
    </header>
    <section>
        <h2>Regístrate</h2>
        <!-- FORM -->
        <form id="form2" onsubmit="return validar(this)">
            <!-- Datos -->
            <fieldset>
                <legend>Datos:</legend>
                <label for="name" class="label">Usuario: </label>
                <input id="user" name="name" type="text" class="cuadros" placeholder="Escribe tu nombre de USUARIO" required/>
                <label for="name" class="label">Contraseña: </label>
                <input id="pass" name="name" type="text" class="cuadros" placeholder="Escribe tu contraseña" required/>
                <label for="name" class="label">Nombre: </label>
                <input id="name" name="name" type="text" class="cuadros" placeholder="Escribe tu nombre" required/>
                <label for="name" class="label">Primer Apellido: </label>
                <input id="apellido1" name="apellidos" type="text" class="cuadros" placeholder="Escribe tu primer apellido" required/>
                <label for="name" class="label">Segundo Apellido: </label>
                <input id="apellido2" name="apellidos" type="text" class="cuadros" placeholder="Escribe tu segundo apellido"/>
                <label for="email" class="label">E-mail: </label>
                <input id="email" name="email" type="text" class="cuadros" placeholder="email@ejemplo.com" required/>
                <label for="phone" class="label">Teléfono de contacto: </label>
                <input id="telefono" name="phone" type="tel" class="cuadros" placeholder="123456789" required/>
                <label for="name" class="label">Fecha de Nacimiento: </label>
                <input id="fnac" name="fnac" type="date" class="cuadros" placeholder="Escribe tu fecha de nacimiento" required/>

            </fieldset>
            <!-- Presupuesto -->
            <fieldset>
                <legend>Proyecto y Presupuesto:</legend>
                <label for="name" class="label">Proyecto: </label>
                <input id="nombreProyecto" name="name" type="text" class="cuadros" placeholder="Elige el nombre de tu proyecto" required/>
                <label for="elijeProducto" class="label">Elije tus zapatillas:</label>
                <select name="elije" id="elijeProducto" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <?php
            //Comprobar datos y mostrarlos
                if ($result->num_rows > 0) {
                
                    while($row = $result->fetch_assoc()) {
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

                <label for="informacion" class="label">Solicite más Informacion: </label>
                <textarea id="informacion" name="informacion" class="cuadros" cols="30" rows="5" maxlength="300" placeholder="Escribe aquí tus dudas"></textarea>
            </fieldset>
            <!-- Aceptacion de política y envio formulario -->
            <fieldset>
                <legend>Aceptación de condiciones y envío de presupuesto:</legend>
                <label for="checkPolitica" class="label">Política de Privacidad </label>
                <input type="checkbox" id="checkPolitica" required/>
                <input type="reset" value="Borrar todo" class="boton" id="boton1" />
                <input type="submit" class="boton" id="boton2" />
            </fieldset>
        </form>
    </section>
    <!-- FOOTER -->
    <footer>
        <div class="p-footer">
            <p>Centro comercial Lagoh, Sevilla</p>
            <p>670809010</p>
            <a href="/zapatilleate/views/legal.php" class="p-legal">Aviso legal</a>
        </div>
        <div class="div-footer">
            <img src="/zapatilleate/img/insta-icon.png" class="footer-img" alt="instagram">
            <img src="/zapatilleate/img/face-icon.png" class="footer-img" alt="facebook">
        </div>
    </footer>
    <!--Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--Validaciones con JS -->
    <script src="/zapatilleate/js/validation.js"></script>
    <script src="/zapatilleate/js/presupuesto.js"></script>
    <script src="/zapatilleate/js/login.js"></script>

</body>

</html>