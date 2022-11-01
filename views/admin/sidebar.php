<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href='/zapatilleate/index.php'>
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-socks"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Zapatilleate</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/zapatilleate/views/admin/index.php' ? ' active' : '');?>">
        <a class="nav-link" href="/zapatilleate/views/admin/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/zapatilleate/views/admin/noticias.php' ? ' active' : '');?>">
        <a class="nav-link" href="/zapatilleate/views/admin/noticias.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Noticias</span>
        </a>
    </li>

    <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/zapatilleate/views/admin/productos.php' ? ' active' : '');?>">
        <a class="nav-link" href="/zapatilleate/views/admin/productos.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Productos</span>
        </a>
    </li>

    <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/zapatilleate/views/admin/usuarios.php' ? ' active' : '');?>">
        <a class="nav-link" href="/zapatilleate/views/admin/usuarios.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Usuarios</span>
        </a>
    </li>
</ul>