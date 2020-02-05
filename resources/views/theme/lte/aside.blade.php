<div class="app-sidebar sidebar-shadow  sidebar-text-light" >
   
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>

    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li>
                    <a href="">
                        <i class="metismenu-icon pe-7s-display1"></i>
                        Estadisticas
                    </a>
                </li>
                <li>
                    <a href="{{ route("clientes") }}">
                        <i class="metismenu-icon pe-7s-id"></i>
                        Clientes
                    </a>
                </li>
                <li>
                    <a>
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Tablas de Negocio
                    </a>
                </li>
                <li>
                    <a href="{{ route("espacios") }}">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Espacios
                    </a>
                </li>
                <li>
                    <a>
                        <i class="metismenu-icon pe-7s-box1"></i>
                        Parametrizacion
                    </a>
                    <ul>
                        <li><a href="{{ route("deportes") }}">Deportes</a></li>
                        <li><a href="{{ route("deporteposicion") }}">Posiciones Deportes</a></li>
                        <li><a href="{{ route("espaciosservicios") }}">Servicios Espacios</a></li>
                        <li><a href="{{ route("espaciostipos") }}">Tipos Espacios</a></li>
                    </ul>    
                </li>
                <li>
                    <a>
                        <i class="metismenu-icon pe-7s-users"></i>
                        Usuarios
                    </a>
                </li>
                <li>
                    <a>
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Publicidad y contenidos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>