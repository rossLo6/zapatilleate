<header>
    <a href="/zapatilleate/index.php" class="div-header">
        <img src="/zapatilleate/img/header.jpg" alt="imagen zapatillas" id="header-img">
        <h1>Zapatilleate</h1>
    </a>
    <nav id="header-nav">
        <ul>
            <li class="<?php echo ($_SERVER['PHP_SELF'] == '/zapatilleate/index.php' ? ' active' : '');?>">
                <a href="/zapatilleate/index.php">Inicio</a>
            </li>
            <li class="<?php echo ($_SERVER['PHP_SELF'] == '/zapatilleate/views/productos.php' ? ' active' : '');?>">
                <a href="/zapatilleate/views/productos.php">Productos</a>
            </li>
            <li class="<?php echo ($_SERVER['PHP_SELF'] == '/zapatilleate/views/presupuestos.php' || $_SERVER['PHP_SELF'] == '/zapatilleate/views/citas.php' ? ' active' : '');?>">
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
                ?>
            </li>
            <li class="<?php echo ($_SERVER['PHP_SELF'] == '/zapatilleate/views/contacto.php' ? ' active' : '');?>">
                <a href="/zapatilleate/views/contacto.php">Contacto</a>
            </li>
            <?php
                if(isset($_COOKIE['user_rol']) && $_COOKIE['user_rol'] == 1) {
                    echo "
                    <li>
                        <a href='/zapatilleate/views/admin/index.php'>Admin</a>
                    </li>
                    ";
                }
            ?>
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
                <a href='/zapatilleate/views/perfil.php'>". $_COOKIE["user_name"]."</a>
                <button onclick='logoutForm()' class='boton'>Salir</button>
            </div>
            ";
        }
    ?>
</header>