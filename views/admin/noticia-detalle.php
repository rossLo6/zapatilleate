<?php
    include '../../Back/bbdd.php';

    $sql = "SELECT * FROM `noticias` WHERE idNoticia = ".$_GET["id"];
    $result = $conn->query($sql);
    $noticia = $result->fetch_assoc();

    $sql2 = "SELECT * FROM `categorias`";
    $result2 = $conn->query($sql2);
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
                            <h6 class="m-0 font-weight-bold text-primary">Noticias</h6>
                        </div>
                        <div class="card-body">
                            <form class="admin-form" onsubmit="return updateNoticia(this)">
                                <input id="noticia_id" name="noticia_id" type="hidden" value="<?php echo $noticia["idNoticia"]; ?>" required/>
                                <div>
                                    <label for="autor" class="label">Autor: </label>
                                    <input id="autor" name="autor" type="text" value="<?php echo $noticia["autor"]?>" required/>
                                </div>
                                <div>
                                    <label for="titulo" class="label">Titulo: </label>
                                    <input id="titulo" name="titulo" type="text" value="<?php echo $noticia["titulo"]?>" required/>
                                </div>
                                <div>
                                    <label for="cuerpo" class="label">Cuerpo: </label>
                                    <input id="cuerpo" name="cuerpo" type="text" value="<?php echo $noticia["cuerpo"]?>" required/>
                                </div>
                                <div>
                                    <label for="imagen" class="label">Imagen: </label>
                                    <input id="imagen" name="imagen" type="text" value="<?php echo $noticia["imagen"]?>" required/>
                                </div>
                                <div>
                                    <label for="categoria" class="label">Categoria: </label>
                                    <select name="categoria" id="categoria" required>
                                        <?php
                                            if ($result2->num_rows > 0) {
                                                while($row = $result2->fetch_assoc()) {
                                                    echo "<option value='". $row['idCategoria']."' ".($row['idCategoria'] == $noticia["fk_idCategoria"] ? "selected='selected'" : "")."'>". $row['nombre']."</option>";
                                                }
                                            }
                                            $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <input type="submit"/>
                            </form>
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
    <script src="/zapatilleate/js/admin/noticias.js"></script>
</body>

</html>