@extends("theme.lte.layout")
@section('titulo')
Crear Usuario
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-box1 icon-gradient bg-night-fade">
                </i>
            </div>
            <div>Crear Usuario</div>
        </div>
    </div>
</div>

<form action="{{ route('usuarios-crear') }}" method="POST" enctype="multipart/form-data">
     <div class="text-right">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
    <br>
    @include('admin.usuarios.form')
</form>

@endsection