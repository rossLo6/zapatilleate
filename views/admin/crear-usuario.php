<?php
    if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
        header("Location: /zapatilleate/index.php");
        exit();
    }
    
    include '../../Back/bbdd.php';

    $sql = "SELECT * FROM `rol`";
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
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Declaración de fichero de estilos -->
    <link href="/zapatilleate/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/zapatilleate/css/styles.css">
        <link rel="stylesheet" type="text/css" href="/zapatilleate/css/login.css">
    <title>Trabajo obligatorio - Zapatilleate</title>
</head>

<body>
    <!-- HEADER -->
    <?php include '../header.php';?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Administracion</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Usuario</h6>
                        </div>
                        <div class="card-body">
                            <form class="admin-form" onsubmit="return createUser(this)">
                                <div>
                                    <label for="nombre" class="label">Nombre:</label>
                                    <input id="nombre" name="nombre" type="text" class="cuadros" required/>
                                </div>
                                <div>
                                    <label for="apellidos" class="label">Apellidos:</label>
                                    <input id="apellidos" name="apellidos" type="text" class="cuadros" required/>
                                </div>
                                <div>
                                    <label for="email" class="label">Email:</label>
                                    <input id="email" name="email" type="email" class="cuadros" required/>
                                </div>
                                <div>
                                    <label for="f_nacimiento" class="label">Fecha de Nacimiento:</label>
                                    <input id="f_nacimiento" type="date" name="f_nacimiento" class="cuadros"/>
                                </div>
                                <div>
                                    <label for="telefono" class="label">Telefono:</label>
                                    <input id="telefono" name="telefono" type="number" class="cuadros"/>
                                </div>
                                <div>
                                    <label for="direccion" class="label">Direccion:</label>
                                    <input id="direccion" name="direccion" type="text" class="cuadros" required/>
                                </div>
                                <div>
                                    <label for="sexo" class="label">Sexo:</label>
                                    <select name="sexo" id="sexo" class="cuadros">
                                        <option value="" disabled selected>Selecciona una opción</option>
                                        <option value="femenino">Femenino</option>
                                        <option value="masculino">Masculino</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="usuario" class="label">Usuario:</label>
                                    <input id="usuario" name="usuario" type="text" class="cuadros" required/>
                                </div>
                                <div>
                                    <label for="password" class="label">Password:</label>
                                    <input id="password" name="password" type="password" class="cuadros" required/>
                                </div>
                                <input type="submit"/>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Footer -->
    <?php include '../footer.php';?>
    <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="/zapatilleate/vendor/jquery/jquery.min.js"></script>

    <!-- Page level plugins -->
    <script src="/zapatilleate/js/admin/usuarios.js"></script>
</body>

</html>