@extends('theme.lte.layout')

@section('titulo') Landing pages @endsection

@section('contenido')
<style>
    .landing-hero{border-radius:22px;padding:30px;color:#fff;background:linear-gradient(135deg,#182848,#4b6cb7);box-shadow:0 18px 40px rgba(29,52,97,.18)}
    .landing-hero h1{font-size:30px;font-weight:700;margin:0 0 6px}.landing-hero p{opacity:.78;margin:0}
    .landing-form-card,.landing-list-card{border:0;border-radius:18px;box-shadow:0 8px 26px rgba(33,45,80,.08);overflow:hidden}.landing-form-card .card-body{padding:26px}
    .landing-section-title{font-size:12px;text-transform:uppercase;letter-spacing:.12em;color:#8490a8;font-weight:700;margin:22px 0 12px}
    .landing-logo-drop{border:2px dashed #d7deeb;border-radius:14px;padding:14px;background:#fafbfe;cursor:pointer;transition:.2s}.landing-logo-drop:hover{border-color:#4b6cb7;background:#f3f6ff}
    .landing-logo-preview{width:74px;height:74px;object-fit:contain;border-radius:12px;background:#fff;border:1px solid #e6eaf2;padding:8px}.landing-logo-empty{width:74px;height:74px;border-radius:12px;background:#edf1f8;display:flex;align-items:center;justify-content:center;color:#9ba7bd;font-size:26px}
    .landing-module{display:inline-flex;align-items:center;gap:8px;border:1px solid #e1e6ef;border-radius:11px;padding:10px 13px;margin:0 8px 8px 0;background:#fff;cursor:pointer;font-size:13px;color:#536078;transition:.2s}.landing-module:has(input:checked){background:#edf3ff;border-color:#4b6cb7;color:#24458f;box-shadow:0 4px 12px rgba(75,108,183,.15)}.landing-module input{accent-color:#4b6cb7}
    .landing-list-card .card-header{background:#fff;border:0;padding:20px 24px}.landing-list-card .card-body{padding:0 24px 24px}.landing-brand-dot{width:44px;height:44px;border-radius:13px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:18px;flex:0 0 auto}.landing-code{font-family:monospace;color:#69758b;background:#f3f5f9;border-radius:6px;padding:3px 7px}
</style>

<div class="landing-hero mb-4 d-flex align-items-center justify-content-between">
    <div><h1>Experiencias personalizadas</h1><p>Crea accesos de Sportodos con identidad propia y controla qué módulos puede ver cada comunidad.</p></div>
    <i class="pe-7s-browser" style="font-size:64px;opacity:.22"></i>
</div>
@if(session('mensaje')) <div class="alert alert-success border-0 shadow-sm">{{ session('mensaje') }}</div> @endif
@if(session('error') || !empty($error)) <div class="alert alert-danger border-0 shadow-sm"><strong>No se pudo completar la operación:</strong> {{ session('error') ?: $error }}</div> @endif

<div class="card landing-form-card mb-4"><div class="card-body">
    <div class="d-flex align-items-center mb-2"><div class="landing-brand-dot mr-3" style="background:#4b6cb7"><i class="pe-7s-plus"></i></div><div><h3 class="mb-0">Nueva landing page</h3><small class="text-muted">Ejemplo: /360</small></div></div>
    <form action="{{ route('landing-pages-crear') }}" method="POST" enctype="multipart/form-data">@csrf
        @include('admin.landing-pages.form', ['item' => null])
        <div class="text-right mt-3"><button class="btn btn-primary px-4" type="submit"><i class="fas fa-magic mr-1"></i> Crear experiencia</button></div>
    </form>
</div></div>

<div class="landing-section-title">Experiencias creadas</div>
@forelse(($listado ?: []) as $item)
<div class="card landing-list-card mb-3"><div class="card-header d-flex align-items-center">
    @if(!empty($item['logo_url'])) <img src="{{ $item['logo_url'] }}" alt="{{ $item['name'] }}" class="landing-logo-preview mr-3"> @else <div class="landing-brand-dot mr-3" style="background:{{ $item['primary_color'] ?? '#4b6cb7' }}">{{ strtoupper(substr($item['name'],0,1)) }}</div> @endif
    <div><h4 class="mb-1">{{ $item['name'] }}</h4><span class="landing-code">/{{ $item['slug'] }}</span></div>
    <div class="ml-auto text-right"><span class="badge badge-{{ ($item['active'] ?? true) ? 'success' : 'secondary' }} px-2 py-1">{{ ($item['active'] ?? true) ? 'Activa' : 'Inactiva' }}</span><br><small class="text-muted">{{ count($item['modules'] ?? []) }} módulos</small></div>
</div><div class="card-body">
    <form action="{{ route('landing-pages-actualizar', ['id' => $item['id']]) }}" method="POST" enctype="multipart/form-data">@csrf
        @include('admin.landing-pages.form', ['item' => $item])
        <div class="d-flex justify-content-between mt-3"><button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Guardar cambios</button></div>
    </form>
    <form action="{{ route('landing-pages-eliminar', ['id' => $item['id']]) }}" method="POST" class="text-right mt-n4">@csrf <button type="submit" class="btn btn-link text-danger btn-sm" onclick="return confirm('¿Eliminar esta landing page?')">Eliminar experiencia</button></form>
</div></div>
@empty
<div class="card landing-list-card"><div class="card-body text-center text-muted py-5"><i class="pe-7s-browser" style="font-size:48px"></i><p class="mt-3 mb-0">Aún no has creado ninguna landing page.</p></div></div>
@endforelse
@endsection
