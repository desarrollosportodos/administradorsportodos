@extends("theme.lte.layout")
@section('titulo')
Crear Iniciativa
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-box1 icon-gradient bg-night-fade">
                </i>
            </div>
            <div>Crear Iniciativa</div>
        </div>
    </div>
</div>

<form action="{{ route('iniciativas-crear') }}" method="POST" enctype="multipart/form-data">
     <div class="text-right">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
    <br>
    @include('admin.iniciativas.form')
</form>

@endsection