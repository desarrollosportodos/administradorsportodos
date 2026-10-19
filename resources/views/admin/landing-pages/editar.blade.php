@extends('theme.lte.layout')

@section('titulo') Editar landing page @endsection

@section('contenido')
<div class="d-flex align-items-center justify-content-between mb-4"><div><h2 class="mb-1">Editar landing page</h2><p class="text-muted mb-0">Actualiza la identidad y experiencia de acceso de <strong>{{ $item['name'] }}</strong>.</p></div><a href="{{ route('landing-pages') }}" class="btn btn-light"><i class="fas fa-arrow-left mr-1"></i> Volver al listado</a></div>
<div class="card landing-form-card"><div class="card-body">
    <form action="{{ route('landing-pages-actualizar', ['id' => $item['id']]) }}" method="POST" enctype="multipart/form-data">@csrf
        @include('admin.landing-pages.form', ['item' => $item])
        <div class="d-flex justify-content-between align-items-center mt-4"><button type="submit" class="btn btn-primary px-4"><i class="fas fa-save mr-1"></i> Guardar cambios</button><button type="submit" form="delete-landing" class="btn btn-link text-danger" onclick="return confirm('¿Eliminar esta landing page?')">Eliminar landing</button></div>
    </form>
    <form id="delete-landing" action="{{ route('landing-pages-eliminar', ['id' => $item['id']]) }}" method="POST">@csrf</form>
</div></div>
@endsection
