@extends("theme.lte.layout")
@section('titulo')
Editar punto de encuentro
@endsection
@section('contenido')
<div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-box1 icon-gradient bg-night-fade">
                    </i>
                </div>
                <h1 class="titulo-general"><a href="{{ route('puntos') }}" >Gestion de Puntos de encuentro</a> / <a href="{{ route('puntos-detalle',[ 'id' => $data['punto']['id'] ]) }}" >{{$data['punto']['nombre']}}</a> / Editar  </h1>
            </div>
            <div class="page-title-actions">
                
            </div>
        </div>
    </div>

<form action="{{ route('puntos-actualizar',[ 'id' => $data['punto']['id'] ]) }}" method="POST" enctype="multipart/form-data" >
    @include('admin.puntos.form')
    <div class="text-right">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>

@endsection