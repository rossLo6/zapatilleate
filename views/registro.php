<?php
    if(isset($_COOKIE['user_id'])) {
        header("Location: /zapatilleate/index.php");
        exit();
    }
    include '../Back/bbdd.php';

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
<?php include 'header.php';?>
    <section>
        <h2>Regístrate</h2>
        <!-- FORM -->
        <form id="register-form" onsubmit="return validar(this)">
            <a href="/zapatilleate/views/login.php">¿Ya tienes cuenta? Identificate</a>
            <!-- Datos -->
            <fieldset>
                <legend>Datos:</legend>
                <label for="user" class="label">Usuario: </label>
                <input id="user" name="user" type="text" class="cuadros" placeholder="Escribe tu nombre de usuario" required/>
                <label for="pass" class="label">Contraseña: </label>
                <input id="pass" name="pass" type="password" class="cuadros" placeholder="Escribe tu contraseña" required/>
                <label for="name" class="label">Nombre: </label>
                <input id="name" name="name" type="text" class="cuadros" placeholder="Escribe tu nombre" required/>
                <label for="apellidos" class="label">Apellidos:</label>
                <input id="apellidos" name="apellidos" type="text" class="cuadros" placeholder="Escribe tus apellidos" required/>
                <label for="email" class="label">E-mail: </label>
                <input id="email" name="email" type="text" class="cuadros" placeholder="email@ejemplo.com" required/>
                <label for="phone" class="label">Teléfono de contacto: </label>
                <input id="telefono" name="phone" type="tel" class="cuadros" placeholder="123456789" required/>
                <label for="fnac" class="label">Fecha de Nacimiento: </label>
                <input id="fnac" name="fnac" type="date" class="cuadros" placeholder="Escribe tu fecha de nacimiento" required/>
                <label for="direccion" class="label">Dirección:</label>
                <input id="direccion" name="direccion" type="text" class="cuadros" placeholder="Escribe tu dirección" required/>
                <label for="sexo" class="label">Sexo:</label>
                <select name="sexo" id="sexo" class="cuadros" required>
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="femenino">Femenino</option>
                    <option value="masculino">Masculino</option>
                </select>
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

                <label for="motivo" class="label">Solicite más Informacion: </label>
                <textarea id="motivo" name="motivo" class="cuadros" cols="30" rows="5" maxlength="300" placeholder="Escribe aquí tus dudas"></textarea>
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
    <?php include 'footer.php';?>
    <!--Validaciones con JS -->
    <script src="/zapatilleate/js/presupuesto.js"></script>
    

</body>

</html>