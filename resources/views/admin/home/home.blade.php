@extends("theme.lte.layout")
@section('titulo')
Home
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-night-fade">
                </i>
            </div>
            <div>Administrador Sportodos
                <div class="page-title-subheading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde laborum quis distinctio officiis debitis eum veritatis porro magni provident eligendi nostrum dolores fugit maiores quisquam, doloribus optio recusandae quam molestiae.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 ">
        <a class="card-button">
            <div class="row no-gutters align-items-center">
                <div class="col-sm-2 col-lg-2">
                    <i class="metismenu-icon pe-7s-display1"></i>
                </div>
                <div class="col-sm-10 col-lg-10">
                    <h2> Estadisticas</h2>
                </div>
            </div>
            <div class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</div>
        </a>
    </div>
    <div class="col-sm-4">
        <a class="card-button" href="{{ route("puntos") }}">
            <div class="row no-gutters align-items-center">
                <div class="col-sm-2 col-lg-2">
                    <i class="metismenu-icon pe-7s-map-2"></i>
                </div>
                <div class="col-sm-10 col-lg-10">
                    <h2> Puntos de Encuentro</h2>
                   
                </div>
            </div>
            <div class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</div>
        </a>
    </div>
    <div class="col-sm-4">
        <a class="card-button" href="{{ route("parametrizacion-administracion") }}">
            <div class="row no-gutters align-items-center">
                <div class="col-sm-2 col-lg-2">
                    <i class="metismenu-icon pe-7s-box1"></i>
                </div>
                <div class="col-sm-10 col-lg-10">
                    <h2>  Parametrizacion</h2>
                </div>
            </div>
            <div class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</div>
        </a>
    </div>

    <div class="col-sm-4">
        <a class="card-button">
            <div class="row no-gutters align-items-center">
                <div class="col-sm-2 col-lg-2">
                    <i class="metismenu-icon pe-7s-users"></i>
                </div>
                <div class="col-sm-10 col-lg-10">
                    <h2>Usuarios</h2>
                </div>
            </div>
            <div class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</div>
        </a>
    </div>
    <div class="col-sm-4">
        <a class="card-button">
            <div class="row no-gutters align-items-center">
                <div class="col-sm-2 col-lg-2">
                    <i class="metismenu-icon pe-7s-rocket"></i>
                </div>
                <div class="col-sm-10 col-lg-10">
                    <h2>Publicidad y contenidos</h2>
                </div>
            </div>
            <div class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</div>
        </a>
    </div>

</div>
@endsection