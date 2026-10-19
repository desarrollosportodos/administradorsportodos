@extends('theme.lte.layout')

@section('titulo') Crear landing page @endsection

@section('contenido')
<style>.lp-editor-head{display:flex;align-items:center;justify-content:space-between;gap:20px;margin-bottom:22px}.lp-editor-kicker{display:block;margin-bottom:7px;color:#09a966;font-size:11px;font-weight:800;letter-spacing:.16em;text-transform:uppercase}.lp-editor-head h2{margin:0 0 6px;color:#14233f;font-size:27px;font-weight:800;letter-spacing:-.02em}.lp-editor-head p{margin:0;color:#72809a;font-size:13px}.lp-back{border:1px solid #dbe4ef;border-radius:10px;padding:10px 14px;background:#fff;color:#536784;font-size:12px;font-weight:700}.lp-back:hover{background:#f4f7fb;color:#244b91}@media(max-width:600px){.lp-editor-head{display:block}.lp-back{display:inline-block;margin-top:17px}}</style>
<div class="lp-editor-head"><div><span class="lp-editor-kicker">Nueva comunidad</span><h2>Crear landing page</h2><p>Define la identidad, el acceso y los módulos que verá tu comunidad.</p></div><a href="{{ route('landing-pages') }}" class="lp-back"><i class="fas fa-arrow-left mr-1"></i> Volver al listado</a></div>
@if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
<div class="card landing-form-card"><div class="card-body">
    <form action="{{ route('landing-pages-crear') }}" method="POST" enctype="multipart/form-data">@csrf
        @include('admin.landing-pages.form', ['item' => null])
        <div class="d-flex justify-content-end mt-4 pt-3" style="border-top:1px solid #edf1f6"><a href="{{ route('landing-pages') }}" class="btn btn-light mr-2">Cancelar</a><button class="btn btn-primary px-4" type="submit"><i class="fas fa-magic mr-1"></i> Crear landing</button></div>
    </form>
</div></div>
@endsection
