<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow amarillo" >

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        
        @if (Route::has('login'))
            @auth
            <!--li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts >
                    <span class="badge badge-danger badge-counter">1+</span-->
                </a>
                <!-- Dropdown - Alerts -->
                <!--div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header fondo">
                        Notificaciones
                    </h6>
                    
                    <a class="dropdown-item d-flex align-items-center" href="/perfil/docente/{{Auth::user()->id}}">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">Diciembre 01, 2022</div>
                            <span class="font-weight-bold">Completa tu perfil</span>
                        </div>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                </div-->
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
    
            <!-- Nav Item - User Information -->
            
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-dark small">{{ Auth::user()->nombre }}</span>
                    <span class="mr-2 d-none d-lg-inline text-dark small">{{ Auth::user()->level }}</span>
                    <img class="img-profile rounded-circle m-2"
                        src="{{asset('/img/users/'.Auth::user()->img)}}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    @if(Auth::user()->level=="Docente")
                        <a class="dropdown-item" href="/perfil/editar/{{Auth::user()->id}}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Perfil
                        </a>
                        <div class="dropdown-divider"></div>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @else
            <div class="col-sm">
                <span class="mr-2 d-none d-lg-inline text-dark  p-1"> 
                    <a href="{{ route('login') }}" class="text-sm text-light dark:text-gray-500 underline" style="text-decoration:none;">Iniciar sesión</a>
                </span>
                @if (Route::has('register'))
                <span class="mr-2 d-none d-lg-inline text-dark border border-light border-2 p-1 rounded-3"> 
                    <a class="px-4 d-none d-lg-inline text-light" href="{{ route('register') }}" style="text-decoration:none;">Registro</a>
                </span>
                @endif
            </div>
            @endauth
        @endif
        <!-- Nav Item - Alerts -->
        

    </ul>

</nav>