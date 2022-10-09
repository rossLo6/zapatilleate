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
    <title>Productos</title>
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
                <li class="active">
                    <a href="./productos.php">Productos</a>
                </li>
                <li>
                <?php
                        if(!isset($_COOKIE["user_id"])) {
                            echo "
                                <a href='/zapatilleate/views/presupuestos.php'>Presupuesto</a>
                            ";
                        } else {
                            echo "
                                <a href='/zapatilleate/views/citas.php'>Citas</a>
                            ";
                        }
                    ?>                </li>
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
    <!-- GALERIA -->
    <section>
        <h2>Galería de Productos</h2>
        <div id="gallery">
            <h3 id="deportistas">Deportistas</h3>
            <div id="carouselExampleCaptions1" class="carousel slide carouselIMG" data-bs-ride="carousel" data-bs-interval="2500">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="custom-item">
                            <img src="/zapatilleate/img/nike1.jpeg" class="d-block w-100" alt="nike1">
                            <span>Nike1</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/nike2.jpeg" class="d-block w-100" alt="nike2">
                            <span>Nike2</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/nike3.jpeg" class="d-block w-100" alt="nike3">
                            <span>Nike3</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="custom-item">
                            <img src="/zapatilleate/img/nike4.jpeg" class="d-block w-100" alt="nike4">
                            <span>Nike4</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/nike5.jpeg" class="d-block w-100" alt="nike5">
                            <span>Nike5</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/nike6.jpg" class="d-block w-100" alt="nike6">
                            <span>Nike6</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="custom-item">
                            <img src="/zapatilleate/img/nike7.jpg" class="d-block w-100" alt="nike7">
                            <span>Nike7</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/nike8.jpg" class="d-block w-100" alt="nike8.jpg">
                            <span>Nike8</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/nike9.jpg" class="d-block w-100" alt="nike9.jpg">
                            <span>Nike9</span>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
            <h3 id="aventureros">Aventureros</h3>
            <div id="carouselExampleCaptions2" class="carousel slide carouselIMG" data-bs-ride="carousel" data-bs-interval="2500">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="custom-item">
                            <img src="/zapatilleate/img/solomon1.jpg" class="d-block w-100" alt="solomon1">
                            <span>Solomon1</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/solomon2.jpg" class="d-block w-100" alt="solomon2">
                            <span>Solomon2</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/solomon3.jpg" class="d-block w-100" alt="solomon3">
                            <span>Solomon3</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="custom-item">
                            <img src="/zapatilleate/img/solomon4.jpg" class="d-block w-100" alt="solomon4">
                            <span>Solomon4</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/solomon5.jpg" class="d-block w-100" alt="solomon5">
                            <span>Solomon5</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/solomon6.jpg" class="d-block w-100" alt="solomon6">
                            <span>Solomon6</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="custom-item">
                            <img src="/zapatilleate/img/solomon7.jpg" class="d-block w-100" alt="solomon7">
                            <span>Solomon7</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/solomon8.jpg" class="d-block w-100" alt="solomon8.jpg">
                            <span>Solomon8</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/solomon9.jpg" class="d-block w-100" alt="solomon9.jpg">
                            <span>Solomon9</span>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
            <h3 id="fiesteros">Fiesteros</h3>
            <div id="carouselExampleCaptions3" class="carousel slide carouselIMG" data-bs-ride="carousel" data-bs-interval="2500">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="custom-item">
                            <img src="/zapatilleate/img/converse1.jpg" class="d-block w-100" alt="converse1">
                            <span>Converse1</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/converse2.jpg" class="d-block w-100" alt="converse2">
                            <span>Converse2</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/converse3.jpg" class="d-block w-100" alt="converse3">
                            <span>Converse3</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="custom-item">
                            <img src="/zapatilleate/img/converse4.jpg" class="d-block w-100" alt="converse4">
                            <span>Converse4</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/converse5.jpg" class="d-block w-100" alt="converse5">
                            <span>Converse5</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/converse6.jpg" class="d-block w-100" alt="converse6">
                            <span>Converse6</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="custom-item">
                            <img src="/zapatilleate/img/converse7.jpg" class="d-block w-100" alt="converse7">
                            <span>Converse7</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/converse8.jpg" class="d-block w-100" alt="converse8.jpg">
                            <span>Converse8</span>
                        </div>
                        <div class="custom-item">
                            <img src="/zapatilleate/img/converse9.jpg" class="d-block w-100" alt="converse9.jpg">
                            <span>Converse9</span>
                        </div>
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions3" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions3" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!--- FOOTER -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/zapatilleate/js/validation.js"></script>
    <script src="/zapatilleate/js/login.js"></script>
</body>

</html>