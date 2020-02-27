@extends("theme.lte.layout")
@section('titulo')
Home
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-box1 icon-gradient bg-night-fade">
                </i>
            </div>
            <div>Parametrizacion
                <div class="page-title-subheading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde laborum quis distinctio officiis debitis eum veritatis porro magni provident eligendi nostrum dolores fugit maiores quisquam, doloribus optio recusandae quam molestiae.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-3">
        <a class="card-button" href="{{ route("deportes") }}">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <i class="metismenu-icon pe-7s-box1"></i>
                </div>
                <div class="col-sm-9">
                    <h2> Deportes</h2>
                    <div class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-3">
        <a class="card-button" href="{{ route("deporteposicion") }}">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <i class="metismenu-icon pe-7s-box1"></i>
                </div>
                <div class="col-sm-9">
                    <h2> Posiciones Deportes</h2>
                    <div class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-3">
        <a class="card-button" href="{{ route("espaciosservicios") }}">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <i class="metismenu-icon pe-7s-box1"></i>
                </div>
                <div class="col-sm-9">
                    <h2> Servicios Espacios</h2>
                    <div class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-3">
        <a class="card-button" href="{{ route("espaciostipos") }}">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <i class="metismenu-icon pe-7s-box1"></i>
                </div>
                <div class="col-sm-9">
                    <h2> Tipos Espacios</h2>
                    <div class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-3">
        <a class="card-button" href="{{ route("deportebarrera") }}">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <i class="metismenu-icon pe-7s-box1"></i>
                </div>
                <div class="col-sm-9">
                    <h2> Barreras Deportes</h2>
                    <div class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-3">
        <a class="card-button">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <i class="metismenu-icon pe-7s-box1"></i>
                </div>
                <div class="col-sm-9">
                    <h2> Tablas de Sistema</h2>
                    <div class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</div>
                </div>
            </div>
        </a>
    </div>
    

</div>
@endsection