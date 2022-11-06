<?php
    if(!isset($_COOKIE['user_id'])) {
        header("Location: /zapatilleate/index.php");
        exit();
    }

    include '../Back/bbdd.php';

    $sql = "SELECT * FROM `users_data` WHERE idUsuario = ".$_COOKIE['user_id'];
    $result = $conn->query($sql);

    $user = $result->fetch_assoc();
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
        <h1>Mi Perfil</h1>

        <form id="form2" onsubmit="return actualizarUsuario(this)">
            <fieldset>
                <label for="nombre" class="label">Nombre:</label>
                <input id="nombre" name="nombre" type="text" class="cuadros" value="<?php echo $user["nombre"]; ?>" required/>
                <label for="apellidos" class="label">Apellidos:</label>
                <input id="apellidos" name="apellidos" type="text" class="cuadros" value="<?php echo $user["apellidos"]; ?>" required/>
                <label for="email" class="label">Email:</label>
                <input id="email" name="email" type="email" class="cuadros" value="<?php echo $user["email"]; ?>" required/>
                <label for="f_nacimiento" class="label">Fecha de Nacimiento:</label>
                <input id="f_nacimiento" type="date" name="f_nacimiento" class="cuadros" value="<?php echo $user["fnac"]; ?>"/>
                <label for="telefono" class="label">Telefono:</label>
                <input id="telefono" name="telefono" type="number" class="cuadros" value="<?php echo $user["telefono"]; ?>"/>
                <label for="direccion" class="label">Direccion:</label>
                <input id="direccion" name="direccion" type="text" class="cuadros" value="<?php echo $user["direccion"]; ?>" required/>
                <label for="sexo" class="label">Sexo:</label>
                <select name="sexo" id="sexo" class="cuadros">
                    <option value="femenino" <?php echo ($user['sexo'] == 'femenino' ? "selected='selected'" : "") ?>>Femenino</option>
                    <option value="masculino" <?php echo ($user['sexo'] == 'masculino' ? "selected='selected'" : "") ?>>Masculino</option>
                </select>
            </fieldset>
            <fieldset>
                <label for="password" class="label">Contraseña:</label>
                <input id="password" name="password" type="password" class="cuadros"/>
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
    <script src="/zapatilleate/js/perfil.js"></script>
    <?php
        $conn->close();
    ?>
</body>

</html>