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
                <li class="<?php if( isset($asideactual) && $asideactual == 1 ) { echo "mm-active";  }?> ">
                    <a href="{{ route("home-administracion") }}">
                        <i class="metismenu-icon pe-7s-home"></i>
                       Inicio
                    </a>
                </li>
                <li  class="<?php if( isset($asideactual) && $asideactual == 2 ) { echo "mm-active";  }?> ">
                    <a >
                        <i class="metismenu-icon pe-7s-display1"></i>
                        Estadisticas
                    </a>
                </li>
                <li class="<?php if( isset($asideactual) && $asideactual == 3 ) { echo "mm-active";  }?> ">
                    <a  href="#" >
                        <i class="metismenu-icon pe-7s-map-2"></i>
                        Puntos de Encuentro
                    </a>
                    <ul>
                        <li><a href="{{ route("puntos") }}">Listado</a></li>
                        <li><a href="{{ route("cargapuntos") }}">Cargar</a></li>
                        
                    </ul>  
                </li>
                <li class="<?php if( isset($asideactual) && $asideactual == 7 ) { echo "mm-active";  }?> ">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-like"></i>
                        Iniciativas
                    </a>
                    <ul>
                        <li><a href="{{ route("iniciativas") }}">Listado</a></li>
                        <li><a href="{{ route("iniciativasolicitud") }}">Solicitudes</a></li>
                        
                    </ul>    
                </li>
                <li  class="<?php if( isset($asideactual) && $asideactual == 4 ) { echo "mm-active";  }?> ">
                    <a href="">
                        <i class="metismenu-icon pe-7s-box1"></i>
                        Parametrizacion
                    </a>
                    <ul>
                        <li><a href="{{ route("deportes") }}">Deportes</a></li>
                        <li><a href="{{ route("deporteposicion") }}">Posiciones Deportes</a></li>
                        <li><a href="{{ route("servicios") }}">Servicios</a></li>
                        <li><a href="{{ route("deportebarrera") }}">Barreras Deportes</a></li>
                        <li><a href="{{ route("categoriainiciativas") }}">Categorias de Iniciativas</a></li>
                        <li><a>Tablas de Sistema</a></li>
                    </ul>    
                </li>
                <li class="<?php if( isset($asideactual) && $asideactual == 5 ) { echo "mm-active";  }?> ">
                    <a href="{{ route("usuarios") }}">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Usuarios
                    </a>
                </li>
                <li  class="<?php if( isset($asideactual) && $asideactual == 6 ) { echo "mm-active";  }?> ">
                    <a>
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Publicidad y contenidos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>