@extends("theme.lte.layout")
@section('titulo')
Editar usuarios
@endsection
@section('contenido')
<div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-box1 icon-gradient bg-night-fade">
                    </i>
                </div>
                <h1 class="titulo-general"><a href="{{ route('usuarios') }}" >usuarios</a> / Editar {{$data['user_names']}}    </h1>
            </div>
            <div class="page-title-actions">
                
            </div>
        </div>
    </div>

<form action="{{ route('usuarios-actualizar',[ 'id' => $data['user_id'] ]) }}" method="POST" enctype="multipart/form-data" >
     <div class="text-right">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
    <br>
    @include('admin.usuarios.form')
   
</form>

@endsection