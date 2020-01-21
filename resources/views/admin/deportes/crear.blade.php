@extends("theme.lte.layout")
@section('titulo')
Crear Recursos o Espacios
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-box1 icon-gradient bg-night-fade">
                </i>
            </div>
            <div>Crear Espacio o Recurso
                <div class="page-title-subheading">en este modulo podras crear un espacio de trabajo o un recurso del que tus clientes podran hacer uso.
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('tipos-recursos-crear') }}" method="POST">
    @include('admin.tipoelementos.form')
    <div class="text-right">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>

@endsection