<?php
    if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
        header("Location: /zapatilleate/index.php");
        exit();
    }

    include '../../Back/bbdd.php';
    
    $sql = "SELECT * FROM `proyectos` WHERE fk_idUsuario = ".$_GET["id"];
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
    <!-- Sidebar -->
    <?php include '../header.php';?>
    <!-- End of Sidebar -->

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
                            <h6 class="m-0 font-weight-bold text-primary">Cita</h6>
                        </div>
                        <div class="card-body">
                            <form class="admin-form" onsubmit="return crearCita(this)">
                                <input id="idUsuario" name="idUsuario" type="hidden" value="<?php echo $_GET["id"]; ?>"/>
                                <div>
                                    <label for="idProyecto" class="label">Proyecto:</label>
                                    <select name="idProyecto" id="idProyecto" class="cuadros" required>
                                        <?php
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='". $row['idProyecto']."'>". $row['nombre']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="fecha" class="label">Fecha:</label>
                                    <input id="fecha" type="datetime-local" name="fecha" class="cuadros" value="<?php echo ($cita["fecha"].'T'.$cita["hora"]) ?>" required/>
                                </div>
                                <div>
                                    <label for="motivo" class="label">Motivo: </label>
                                    <textarea id="motivo" name="motivo" class="cuadros" cols="30" rows="5" maxlength="300" placeholder="Escribe aquí tus dudas"></textarea>
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
    <script src="/zapatilleate/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/zapatilleate/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="/zapatilleate/js/admin/citas.js"></script>
</body>

</html>