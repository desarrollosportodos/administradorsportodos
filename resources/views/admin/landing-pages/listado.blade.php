@extends('theme.lte.layout')

@section('titulo') Landing pages @endsection

@section('contenido')
<style>
    .landing-hero{border-radius:22px;padding:30px;color:#fff;background:linear-gradient(135deg,#182848,#4b6cb7);box-shadow:0 18px 40px rgba(29,52,97,.18)}
    .landing-hero h1{font-size:30px;font-weight:700;margin:0 0 6px}.landing-hero p{opacity:.78;margin:0}
    .landing-list-card{border:0;border-radius:18px;box-shadow:0 8px 26px rgba(33,45,80,.08);overflow:hidden}.landing-list-card .card-header{background:#fff;border:0;padding:20px 24px}.landing-list-card .card-body{padding:0 24px 24px}.landing-brand-dot{width:52px;height:52px;border-radius:15px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:20px;flex:0 0 auto}.landing-logo-preview{width:74px;height:74px;object-fit:contain;border-radius:12px;background:#fff;border:1px solid #e6eaf2;padding:8px}.landing-code{font-family:monospace;color:#69758b;background:#f3f5f9;border-radius:6px;padding:3px 7px}
    .landing-stat{border:1px solid #e8edf5;border-radius:12px;padding:12px 14px;background:#fbfcfe}.landing-stat strong{display:block;color:#243553;font-size:18px}.landing-stat span{font-size:11px;color:#8995a8}.landing-empty{border:1px dashed #ccd6e6;border-radius:18px;background:#fbfcff}
</style>

<div class="landing-hero mb-4 d-flex align-items-center justify-content-between">
    <div><h1>Landing pages</h1><p>Administra las comunidades personalizadas de Sportodos.</p></div>
    <a href="{{ route('landing-pages-crear-vista') }}" class="btn btn-warning px-4"><i class="fas fa-plus mr-1"></i> Nueva landing</a>
</div>
@if(session('mensaje')) <div class="alert alert-success border-0 shadow-sm">{{ session('mensaje') }}</div> @endif
@if(session('error') || !empty($error)) <div class="alert alert-danger border-0 shadow-sm"><strong>No se pudo completar la operación:</strong> {{ session('error') ?: $error }}</div> @endif

<div class="d-flex align-items-center justify-content-between mb-3"><div><h3 class="mb-1">Tus comunidades</h3><p class="text-muted mb-0">{{ count($listado ?: []) }} landing(s) configurada(s).</p></div></div>
@forelse(($listado ?: []) as $item)
<div class="card landing-list-card mb-3"><div class="card-header d-flex align-items-center">
    @if(!empty($item['logo_url'])) <img src="{{ $item['logo_url'] }}" alt="{{ $item['name'] }}" class="landing-logo-preview mr-3"> @else <div class="landing-brand-dot mr-3" style="background:{{ $item['primary_color'] ?? '#4b6cb7' }}">{{ strtoupper(substr($item['name'],0,1)) }}</div> @endif
    <div><h4 class="mb-1">{{ $item['name'] }}</h4><span class="landing-code">/{{ $item['slug'] }}</span></div>
    <div class="ml-auto text-right"><span class="badge badge-{{ ($item['active'] ?? true) ? 'success' : 'secondary' }} px-2 py-1">{{ ($item['active'] ?? true) ? 'Activa' : 'Inactiva' }}</span><br><small class="text-muted">Tema {{ ($item['theme_mode'] ?? 'dark') === 'light' ? 'claro' : 'oscuro' }}</small></div>
</div><div class="card-body"><div class="row mb-3"><div class="col-sm-4"><div class="landing-stat"><strong>{{ count($item['modules'] ?? []) }}</strong><span>Módulos activos</span></div></div><div class="col-sm-4"><div class="landing-stat"><strong>{{ $item['primary_color'] ?? '—' }}</strong><span>Color principal</span></div></div><div class="col-sm-4"><div class="landing-stat"><strong>{{ !empty($item['auth_background_url']) ? 'Sí' : 'No' }}</strong><span>Fondo de acceso</span></div></div></div><a href="{{ route('landing-pages-editar-vista', ['id' => $item['id']]) }}" class="btn btn-primary"><i class="fas fa-pen mr-1"></i> Editar landing</a></div></div>
@empty
<div class="landing-empty text-center text-muted py-5"><i class="pe-7s-browser" style="font-size:48px"></i><p class="mt-3 mb-3">Aún no has creado ninguna landing page.</p><a href="{{ route('landing-pages-crear-vista') }}" class="btn btn-primary">Crear la primera landing</a></div>
@endforelse
@endsection
