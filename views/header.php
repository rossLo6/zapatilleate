<header>
    <a href="/zapatilleate/index.php" class="div-header">
        <img src="/zapatilleate/img/header.jpg" alt="imagen zapatillas" id="header-img">
        <h1>Zapatilleate</h1>
    </a>
    <?php
        if(isset($_COOKIE["user_id"])) {
            echo "
            <div class='loged'>
                <a href='/zapatilleate/views/perfil.php'>". $_COOKIE["user_name"]."</a>
                <button onclick='logoutForm()' class='boton'>Salir</button>
            </div>
            ";
        }
    ?>
    <nav id="header-nav">
        <ul>
            <li class="<?php echo ($_SERVER['PHP_SELF'] == '/zapatilleate/index.php' ? ' active' : '');?>">
                <a href="/zapatilleate/index.php">Inicio</a>
            </li>
            <li class="<?php echo ($_SERVER['PHP_SELF'] == '/zapatilleate/views/noticia-listado.php' ? ' active' : '');?>">
                <a href="/zapatilleate/views/noticia-listado.php">Noticias</a>
            </li>
            <?php
                if(!isset($_COOKIE["user_id"]) || $_COOKIE["user_rol"] == 2) {
                    echo "<li class=".($_SERVER['PHP_SELF'] == '/zapatilleate/views/productos.php' ? ' active' : '').">
                        <a href='/zapatilleate/views/productos.php'>Productos</a>
                    </li>";
                }
            ?>
            <?php
                if(!isset($_COOKIE["user_id"])) {
                    echo "<li class=".($_SERVER['PHP_SELF'] == '/zapatilleate/views/registro.php' ? ' active' : '').">
                        <a href='/zapatilleate/views/registro.php'>Registro</a>
                    </li>";
                }
            ?>
            <?php
                if(!isset($_COOKIE["user_id"])) {
                    echo "<li class=".($_SERVER['PHP_SELF'] == '/zapatilleate/views/login.php' ? ' active' : '').">
                        <a href='/zapatilleate/views/login.php'>Identificate</a>
                    </li>";
                }
            ?>
            <?php
                if(isset($_COOKIE["user_id"]) && $_COOKIE["user_rol"] == 2) {
                    echo "<li class=".($_SERVER['PHP_SELF'] == '/zapatilleate/views/citas.php' ? ' active' : '').">
                        <a href='/zapatilleate/views/citas.php'>Citas</a>
                    </li>";
                }
            ?>
            <?php
                if(isset($_COOKIE["user_id"])) {
                    echo "<li class=".($_SERVER['PHP_SELF'] == '/zapatilleate/views/perfil.php' ? ' active' : '').">
                        <a href='/zapatilleate/views/perfil.php'>Perfil</a>
                    </li>";
                }
            ?>
            <?php
                if(isset($_COOKIE["user_id"]) && $_COOKIE["user_rol"] == 1) {
                    echo "<li class=".($_SERVER['PHP_SELF'] == '/zapatilleate/views/admin/usuarios.php' ? ' active' : '').">
                        <a href='/zapatilleate/views/admin/usuarios.php'>Usuarios Administración</a>
                    </li>";
                }
            ?>
            <?php
                if(isset($_COOKIE["user_id"]) && $_COOKIE["user_rol"] == 1) {
                    echo "<li class=".($_SERVER['PHP_SELF'] == '/zapatilleate/views/admin/citas.php' ? ' active' : '').">
                        <a href='/zapatilleate/views/admin/citas.php'>Citas Administración</a>
                    </li>";
                }
            ?>
            <?php
                if(isset($_COOKIE["user_id"]) && $_COOKIE["user_rol"] == 1) {
                    echo "<li class=".($_SERVER['PHP_SELF'] == '/zapatilleate/views/admin/noticias.php' ? ' active' : '').">
                        <a href='/zapatilleate/views/admin/noticias.php'>Noticias Administración</a>
                    </li>";
                }
            ?>
            <?php
                if(isset($_COOKIE["user_id"]) && $_COOKIE["user_rol"] == 1) {
                    echo "<li class=".($_SERVER['PHP_SELF'] == '/zapatilleate/views/admin/productos.php' ? ' active' : '').">
                        <a href='/zapatilleate/views/admin/productos.php'>Productos Administración</a>
                    </li>";
                }
            ?>
            <?php
                if(isset($_COOKIE["user_id"]) && $_COOKIE["user_rol"] == 1) {
                    echo "<li class=".($_SERVER['PHP_SELF'] == '/zapatilleate/views/admin/proyectos.php' ? ' active' : '').">
                        <a href='/zapatilleate/views/admin/proyectos.php'>Proyectos Administración</a>
                    </li>";
                }
            ?>
            <?php
                if(!isset($_COOKIE["user_id"]) || $_COOKIE["user_id"] == 2) {
                    echo "<li class=".($_SERVER['PHP_SELF'] == '/zapatilleate/views/contacto.php' ? ' active' : '').">
                        <a href='/zapatilleate/views/contacto.php'>Contacto</a>
                    </li>";
                }
            ?>
        </ul>
    </nav>
</header>