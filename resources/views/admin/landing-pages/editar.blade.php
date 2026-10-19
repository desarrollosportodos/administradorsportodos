@extends('theme.lte.layout')

@section('titulo') Editar landing page @endsection

@section('contenido')
<style>.lp-editor-head{display:flex;align-items:center;justify-content:space-between;gap:20px;margin-bottom:22px}.lp-editor-kicker{display:block;margin-bottom:7px;color:#09a966;font-size:11px;font-weight:800;letter-spacing:.16em;text-transform:uppercase}.lp-editor-head h2{margin:0 0 6px;color:#14233f;font-size:27px;font-weight:800;letter-spacing:-.02em}.lp-editor-head p{margin:0;color:#72809a;font-size:13px}.lp-back{border:1px solid #dbe4ef;border-radius:10px;padding:10px 14px;background:#fff;color:#536784;font-size:12px;font-weight:700}.lp-back:hover{background:#f4f7fb;color:#244b91}@media(max-width:600px){.lp-editor-head{display:block}.lp-back{display:inline-block;margin-top:17px}}</style>
<div class="lp-editor-head"><div><span class="lp-editor-kicker">Configuración de comunidad</span><h2>Editar landing page</h2><p>Ajusta la identidad y experiencia de acceso de <strong>{{ $item['name'] }}</strong>.</p></div><a href="{{ route('landing-pages') }}" class="lp-back"><i class="fas fa-arrow-left mr-1"></i> Volver al listado</a></div>
<div class="card landing-form-card"><div class="card-body">
    <form action="{{ route('landing-pages-actualizar', ['id' => $item['id']]) }}" method="POST" enctype="multipart/form-data">@csrf
        @include('admin.landing-pages.form', ['item' => $item])
        <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top:1px solid #edf1f6"><button type="submit" class="btn btn-primary px-4"><i class="fas fa-save mr-1"></i> Guardar cambios</button><button type="submit" form="delete-landing" class="btn btn-link text-danger" onclick="return confirm('¿Eliminar esta landing page?')"><i class="fas fa-trash-alt mr-1"></i> Eliminar landing</button></div>
    </form>
    <form id="delete-landing" action="{{ route('landing-pages-eliminar', ['id' => $item['id']]) }}" method="POST">@csrf</form>
</div></div>
@endsection
