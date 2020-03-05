@extends("theme.lte.layout")
@section('titulo')
Editarpunto de encuentro
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-box1 icon-gradient bg-night-fade">
                </i>
            </div>
            <div>Editar punto de encuentro
                <div class="page-title-subheading">en este modulo podras editar un punto de trabajo o un recurso del que tus clientes podran hacer uso.
                </div>
            </div>
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