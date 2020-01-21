@extends("theme.lte.layout")
@section('titulo')
Clientes
@endsection
@section('contenido')
@if (session("mensaje"))
    <div class="alert alert-success alert-dismissible" data-auto-dismmiss='2000'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>Mensaje Sistema</h4>
        <ul>
        <li>{{ session("mensaje") }}</li>
        </ul>
    </div>
@endif
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-id icon-gradient bg-night-fade">
                </i>
            </div>
            <div>Clientes
                <div class="page-title-subheading">Aconticunación encontraras el listado de tus Clientes, podras gestionar y visualizar el detalle de cada uno de ellos.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <a data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-success" data-original-title="Nuevo Cliente" href="{{ route("nuevo-cliente") }}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
</div>

<div >
    @foreach ($clientes as $cliente)
        <a href="{{ route('detallecliente',[ 'id' => $cliente['registro_id'] ]) }}" class="box-cliente">
            <?php if( isset($cliente['registro_imagen']) ){ ?>
                <img src="http://togroow.com/images/{{ $cliente['registro_imagen'] }}" alt="">
            <?php } else { ?>
                <img src="/imagenes/negocios.png" alt="">
            <?php } ?>
            
            <h2>{{ $cliente['registro_nombre'] }}</h2>
        </a>
    @endforeach
</div> 

@endsection