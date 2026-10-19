@extends('theme.lte.layout')

@section('titulo') Crear landing page @endsection

@section('contenido')
<div class="d-flex align-items-center justify-content-between mb-4"><div><h2 class="mb-1">Crear landing page</h2><p class="text-muted mb-0">Configura una comunidad con su identidad, módulos y acceso.</p></div><a href="{{ route('landing-pages') }}" class="btn btn-light"><i class="fas fa-arrow-left mr-1"></i> Volver al listado</a></div>
@if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
<div class="card landing-form-card"><div class="card-body">
    <form action="{{ route('landing-pages-crear') }}" method="POST" enctype="multipart/form-data">@csrf
        @include('admin.landing-pages.form', ['item' => null])
        <div class="d-flex justify-content-end mt-4"><a href="{{ route('landing-pages') }}" class="btn btn-light mr-2">Cancelar</a><button class="btn btn-primary px-4" type="submit"><i class="fas fa-magic mr-1"></i> Crear landing</button></div>
    </form>
</div></div>
@endsection
