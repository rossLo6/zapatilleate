<?php
    include '../../Back/bbdd.php';

    $sql = "SELECT usuarios.*, rol.nombre as rol_nombre FROM `usuarios` INNER JOIN `rol` ON fk_idRol = idRol and idUsuario = ".$_GET["id"];
    $result = $conn->query($sql);
    $usuario = $result->fetch_assoc();

    $sql2 = "SELECT proyectos.*, usuarios.usuario, productos.nombre as producto FROM `proyectos` INNER JOIN `usuarios` ON fk_idUsuario = idUsuario INNER JOIN `productos` ON fk_idProducto = idProducto and fk_idUsuario = ".$_GET["id"];
    $result2 = $conn->query($sql2);

    $sql3 = "SELECT citas.*, proyectos.nombre as proyecto FROM `citas` INNER JOIN `proyectos` ON fk_idProyecto = idProyecto and citas.fk_idUsuario = ".$_GET["id"];
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
    <link href="/zapatilleate/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/admin.css">
    <title>Trabajo obligatorio - Zapatilleate</title>
</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php';?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'topbar.php';?>
                <!-- End of Topbar -->

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
                            <form class="admin-form" onsubmit="return updateUser(this)">
                                <input id="user_id" name="user_id" type="hidden" value="<?php echo $usuario["idUsuario"]; ?>" required/>
                                <div>
                                    <label for="nombre" class="label">Nombre:</label>
                                    <input id="nombre" name="nombre" type="text" class="cuadros" value="<?php echo $usuario["nombre"]; ?>" required/>
                                </div>
                                <div>
                                    <label for="apellido_1" class="label">Primer apellido:</label>
                                    <input id="apellido_1" name="apellido_1" type="text" class="cuadros" value="<?php echo $usuario["apellido1"]; ?>" required/>
                                </div>
                                <div>
                                    <label for="apellido_2" class="label">Segundo apellido:</label>
                                    <input id="apellido_2" name="apellido_2" type="text" class="cuadros" value="<?php echo $usuario["apellido2"]; ?>" required/>
                                </div>
                                <div>
                                    <label for="email" class="label">Email:</label>
                                    <input id="email" name="email" type="email" class="cuadros" value="<?php echo $usuario["email"]; ?>" required/>
                                </div>
                                <div>
                                    <label for="f_nacimiento" class="label">Fecha de Nacimiento:</label>
                                    <input id="f_nacimiento" type="date" name="f_nacimiento" class="cuadros" value="<?php echo $usuario["fnac"]; ?>"/>
                                </div>
                                <div>
                                    <label for="telefono" class="label">Telefono:</label>
                                    <input id="telefono" name="telefono" type="number" class="cuadros" value="<?php echo $usuario["telefono"]; ?>"/>
                                </div>
                                <input type="submit"/>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Proyectos</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Color</th>
                                        <th>Logo</th>
                                        <th>Tipografia</th>
                                        <th>Entrega</th>
                                        <th>Precio</th>
                                        <th>Usuario</th>
                                        <th>Producto</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Color</th>
                                        <th>Logo</th>
                                        <th>Tipografia</th>
                                        <th>Entrega</th>
                                        <th>Precio</th>
                                        <th>Usuario</th>
                                        <th>Producto</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        //Comprobar datos y mostrarlos
                                        if ($result2->num_rows > 0) {
                                            while($row = $result2->fetch_assoc()) {
                                                echo "<tr  class='clickable-row' data-href='/zapatilleate/views/admin/proyecto-detalle.php?id=".$row["idProyecto"]."'>
                                                    <td>".$row["nombre"]."</td>
                                                    <td>".$row["color"]."</td>
                                                    <td>".$row["logo"]."</td>
                                                    <td>".$row["tipografia"]."</td>
                                                    <td>".$row["entrega"]."</td>
                                                    <td>".$row["precio"]."</td>
                                                    <td>".$row["usuario"]."</td>
                                                    <td>".$row["producto"]."</td>
                                                </tr>";
                                            }
                                        } else {
                                            echo "<tr>0 resultados</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Citas</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Proyecto</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Proyecto</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            //Comprobar datos y mostrarlos
                                            if ($result3->num_rows > 0) {
                                                while($row = $result3->fetch_assoc()) {
                                                    echo "<tr  class='clickable-row' data-href='/zapatilleate/views/admin/cita-detalle.php?id=".$row["idCita"]."'>
                                                        <td>".$row["fecha"]."</td>
                                                        <td>".$row["hora"]."</td>
                                                        <td>".$row["proyecto"]."</td>
                                                    </tr>";
                                                }
                                            } else {
                                                echo "<tr>0 resultados</tr>";
                                            }
                                            $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'footer.php';?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
    <script src="/zapatilleate/js/admin/usuarios.js"></script>
</body>

</html>