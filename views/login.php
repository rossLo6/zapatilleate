<?php
    if(isset($_COOKIE['user_id'])) {
        header("Location: /zapatilleate/index.php");
        exit();
    }
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
            <h2>Login</h2>
            <form id='login-form' class='login' onsubmit='return loginForm(this)'>
                <a href="/zapatilleate/views/registro.php">¿No tienes cuenta? Registrate</a>
                <input type='text' id='usuario'>
                <input type='password' id='password'>
                <input type='submit' class='boton-logi' id='login' value='Entrar'/>
            </form>
            <!-- FORM -->
        </section>
        <!-- FOOTER -->
        <?php include 'footer.php';?>
        <!--Validaciones con JS -->
        <script src="/zapatilleate/js/login.js"></script>
    </body>
</html>