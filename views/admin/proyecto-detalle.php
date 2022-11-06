<?php
    if (!isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] != 1) {
        header("Location: /zapatilleate/index.php");
        exit();
    }
    
    include '../../Back/bbdd.php';
    
    $sql = "SELECT * FROM `proyectos` WHERE idProyecto = ".$_GET["id"];
    $result = $conn->query($sql);
    $proyecto = $result->fetch_assoc();

    $sql2 = "SELECT * FROM `productos`";
    $result2 = $conn->query($sql2);

    $sql3 = "SELECT * FROM `citas` WHERE fk_idProyecto = ".$_GET["id"];
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
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/zapatilleate/css/login.css">
    <title>Trabajo obligatorio - Zapatilleate</title>
</head>

<body>
    <!-- header -->
    <?php include '../header.php';?>
    <!-- End of header -->
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
                            <h6 class="m-0 font-weight-bold text-primary">Proyecto</h6>
                        </div>
                        <div class="card-body">
                            <form class="admin-form" onsubmit="return updateProyecto(this)">
                                <input id="idProyecto" name="idProyecto" type="hidden" value="<?php echo $proyecto["idProyecto"]; ?>" required/>
                                <div>
                                    <label for="nombre" class="label">Nombre:</label>
                                    <input id="nombre" name="nombre" type="text" class="cuadros" value="<?php echo $proyecto["nombre"]; ?>" required/>
                                </div>
                                <div>
                                    <label for="idProducto" class="label">Producto:</label>
                                    <select class="cuadros" name="idProducto" id="idProducto" required>
                                        <?php
                                            if ($result2->num_rows > 0) {
                                                while($row = $result2->fetch_assoc()) {
                                                    echo "<option value='". $row['idProducto']."' ".($row['idProducto'] == $proyecto["fk_idProducto"] ? "selected='selected'" : "")."'>". $row['nombre']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="color" class="label">Color:</label>
                                    <input id="color" name="color" type="checkbox" class="cuadros" <?php echo ($proyecto["color"]==1 ? 'checked' : '');?>/>
                                </div>
                                <div>
                                    <label for="logo" class="label">Logo:</label>
                                    <input id="logo" name="logo" type="checkbox" class="cuadros" <?php echo ($proyecto["logo"]==1 ? 'checked' : '');?>/>
                                </div>
                                <div>
                                    <label for="tipografia" class="label">Tipografia:</label>
                                    <input id="tipografia" name="tipografia" type="checkbox" class="cuadros" <?php echo ($proyecto["tipografia"]==1 ? 'checked' : '');?>/>
                                </div>
                                <div>
                                    <label for="entrega" class="label">Entrega:</label>
                                    <input id="entrega" type="date" name="entrega" class="cuadros" value="<?php echo $proyecto["entrega"]; ?>"/>
                                </div>
                                <div>
                                    <label for="precio" class="label">Precio:</label>
                                    <input id="precio" name="precio" type="number" class="cuadros" value="<?php echo $proyecto["precio"]; ?>"/>
                                </div>
                                <input type="submit"/>
                            </form>
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
                                                    <td>".$proyecto["nombre"]."</td>
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
    <script src="/zapatilleate/js/admin/proyectos.js"></script>
</body>

</html>