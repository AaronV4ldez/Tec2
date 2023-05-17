<ul class="navbar-nav fondo sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/welcome">
        <div class="sidebar-brand-icon">
            <img src="https://drive.google.com/uc?export=view&id=1HHksJ1OnFdwfVB2urgnEJemSPE2FQLSG" alt="" width="52px">
        </div>
        <div class="sidebar-brand-text mx-3">ITSNCG</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    @if (Route::has('login'))
        @auth
            @if(Auth::user()->level == "Admin")
            <div class="sidebar-heading">
                Administración
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/admin/">
                    <i class="fa-solid fa-users"></i>
                    <span>Panel de administración</span></a>
            </li>

            <hr class="sidebar-divider">
            @endif
        @endauth
    @endif

    <div class="sidebar-heading">
        Usuarios
    </div>

    <li class="nav-item">
        <a class="nav-link" href="/usuarios/docentes">
            <i class="fa-solid fa-user"></i>
            <span>Investigadores</span></a>
    </li>

    <!--li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-scroll"></i>
            <span>Cuerpos Academicos</span></a>
    </li-->

    <!--li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-graduation-cap"></i>
            <span>Subdirección de Postgrado</span></a>
    </li-->
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Proyectos
    </div>

    <li class="nav-item">
        <a class="nav-link" href="/proyectos/consulta">
            <i class="fa-solid fa-file"></i>
            <span>Proyectos</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/proyectos/crear">
            <i class="fa-solid fa-plus"></i>
            <span>Nuevo Proyecto</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Otros
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span>CATCA</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-image"></i>
            <span>Galeria</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-phone"></i>
            <span>Contactos</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>