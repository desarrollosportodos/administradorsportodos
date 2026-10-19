@extends('theme.lte.layout')

@section('titulo') Landing pages @endsection

@section('contenido')
<style>
    .lp-page{--lp-ink:#14233f;--lp-muted:#72809a;--lp-line:#e3e9f2;--lp-green:#09c978;--lp-orange:#ff762b;color:var(--lp-ink)}
    .lp-hero{position:relative;overflow:hidden;border-radius:24px;padding:30px 34px;background:var(--lp-ink);color:#fff;box-shadow:0 18px 35px rgba(20,35,63,.16)}
    .lp-hero:after{content:"";position:absolute;width:270px;height:270px;border:1px solid rgba(9,201,120,.38);border-radius:50%;right:-75px;top:-110px;box-shadow:0 0 0 26px rgba(9,201,120,.08),0 0 0 52px rgba(255,118,43,.06)}
    .lp-hero-content{position:relative;z-index:1}.lp-eyebrow{display:block;margin-bottom:8px;color:#68f2b4;font-size:11px;font-weight:800;letter-spacing:.18em;text-transform:uppercase}.lp-hero h1{margin:0 0 8px;font-size:32px;font-weight:800;letter-spacing:-.03em}.lp-hero p{max-width:590px;margin:0;color:#bac8df;font-size:14px}.lp-hero .btn{position:relative;z-index:2;border:0;border-radius:11px;padding:12px 18px;background:var(--lp-orange);color:#161f38;font-weight:800;box-shadow:0 9px 20px rgba(255,118,43,.25)}
    .lp-toolbar{display:flex;align-items:end;justify-content:space-between;gap:20px;margin:26px 2px 14px}.lp-toolbar h2{margin:0 0 4px;font-size:21px;font-weight:800}.lp-toolbar p{margin:0;color:var(--lp-muted);font-size:13px}.lp-count{min-width:52px;height:32px;padding:7px 11px;border-radius:99px;background:#e7fbf1;color:#07985c;font-size:12px;font-weight:800;text-align:center}
    .lp-card{margin-bottom:16px;border:1px solid var(--lp-line);border-radius:18px;background:#fff;box-shadow:0 9px 26px rgba(33,55,92,.06);transition:transform .18s ease,box-shadow .18s ease}.lp-card:hover{transform:translateY(-2px);box-shadow:0 14px 30px rgba(33,55,92,.1)}
    .lp-card-head{display:flex;align-items:center;gap:16px;padding:20px 22px;border-bottom:1px solid #edf1f6}.lp-logo{width:58px;height:58px;flex:0 0 58px;display:flex;align-items:center;justify-content:center;object-fit:contain;border-radius:16px;padding:7px;border:1px solid #e4eaf3;background:#f8fafc;color:#fff;font-size:22px;font-weight:800}.lp-card-title{min-width:0}.lp-card-title h3{margin:0 0 6px;font-size:18px;font-weight:800;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.lp-slug{display:inline-block;padding:4px 8px;border-radius:6px;background:#f1f4f8;color:#65748d;font:12px/1.1 monospace}.lp-card-status{margin-left:auto;text-align:right;white-space:nowrap}.lp-status{display:inline-flex;align-items:center;gap:6px;padding:6px 9px;border-radius:99px;font-size:11px;font-weight:800}.lp-status:before{content:"";width:6px;height:6px;border-radius:50%;background:currentColor}.lp-status-on{color:#068c55;background:#e5f9ef}.lp-status-off{color:#7b8799;background:#eef1f5}.lp-theme{display:block;margin-top:7px;color:var(--lp-muted);font-size:11px}
    .lp-card-body{display:flex;align-items:center;gap:18px;padding:16px 22px}.lp-facts{display:flex;flex:1;gap:10px}.lp-fact{min-width:116px;padding:10px 12px;border:1px solid #edf1f6;border-radius:11px;background:#fbfcfe}.lp-fact strong{display:block;color:var(--lp-ink);font-size:15px}.lp-fact span{display:block;margin-top:3px;color:#8a96a8;font-size:10px;text-transform:uppercase;letter-spacing:.06em}.lp-edit{border:0;border-radius:10px;padding:11px 15px;background:#edf2ff;color:#2c559c;font-size:12px;font-weight:800;white-space:nowrap}.lp-edit:hover{background:#dfe8ff;color:#204482}.lp-empty{padding:62px 20px;border:1px dashed #cdd8e8;border-radius:18px;background:#fbfcfe;text-align:center}.lp-empty-icon{display:inline-flex;width:58px;height:58px;align-items:center;justify-content:center;border-radius:18px;background:#e7fbf1;color:var(--lp-green);font-size:27px}.lp-empty h3{margin:16px 0 6px;font-size:18px}.lp-empty p{margin-bottom:18px;color:var(--lp-muted)}
    @media(max-width:700px){.lp-hero{padding:24px}.lp-hero h1{font-size:26px}.lp-hero .btn{margin-top:20px}.lp-hero{display:block!important}.lp-toolbar{align-items:start}.lp-card-head{align-items:flex-start;padding:16px}.lp-card-status{font-size:10px}.lp-card-body{display:block;padding:15px 16px}.lp-facts{display:grid;grid-template-columns:repeat(3,1fr);margin-bottom:14px}.lp-fact{min-width:0}.lp-edit{width:100%}}
</style>

<div class="lp-page">
    <section class="lp-hero d-flex align-items-center justify-content-between mb-4">
        <div class="lp-hero-content"><span class="lp-eyebrow">Centro de comunidades</span><h1>Landing pages</h1><p>Diseña la puerta de entrada de cada comunidad: identidad, módulos y experiencia de acceso en un mismo lugar.</p></div>
        <a href="{{ route('landing-pages-crear-vista') }}" class="btn"><i class="fas fa-plus mr-1"></i> Nueva landing</a>
    </section>

    @if(session('mensaje')) <div class="alert alert-success border-0 shadow-sm">{{ session('mensaje') }}</div> @endif
    @if(session('error') || !empty($error)) <div class="alert alert-danger border-0 shadow-sm"><strong>No se pudo completar la operación:</strong> {{ session('error') ?: $error }}</div> @endif

    <div class="lp-toolbar"><div><h2>Tus comunidades</h2><p>Gestiona la configuración y apariencia de cada experiencia.</p></div><span class="lp-count">{{ count($listado ?: []) }}</span></div>

    @forelse(($listado ?: []) as $item)
        <article class="lp-card">
            <div class="lp-card-head">
                @if(!empty($item['logo_url'])) <img src="{{ $item['logo_url'] }}" alt="{{ $item['name'] }}" class="lp-logo"> @else <div class="lp-logo" style="background:{{ $item['primary_color'] ?? '#2c559c' }}">{{ strtoupper(substr($item['name'],0,1)) }}</div> @endif
                <div class="lp-card-title"><h3>{{ $item['name'] }}</h3><span class="lp-slug">/{{ $item['slug'] }}</span></div>
                <div class="lp-card-status"><span class="lp-status {{ ($item['active'] ?? true) ? 'lp-status-on' : 'lp-status-off' }}">{{ ($item['active'] ?? true) ? 'Activa' : 'Inactiva' }}</span><span class="lp-theme"><i class="fas fa-adjust mr-1"></i> Tema {{ ($item['theme_mode'] ?? 'dark') === 'light' ? 'claro' : 'oscuro' }}</span></div>
            </div>
            <div class="lp-card-body"><div class="lp-facts"><div class="lp-fact"><strong>{{ count($item['modules'] ?? []) }}</strong><span>Módulos activos</span></div><div class="lp-fact"><strong>{{ $item['primary_color'] ?? '—' }}</strong><span>Color principal</span></div><div class="lp-fact"><strong>{{ !empty($item['auth_background_url']) ? 'Listo' : 'Pendiente' }}</strong><span>Fondo de acceso</span></div></div><a href="{{ route('landing-pages-editar-vista', ['id' => $item['id']]) }}" class="lp-edit"><i class="fas fa-pen mr-1"></i> Editar landing</a></div>
        </article>
    @empty
        <div class="lp-empty"><span class="lp-empty-icon"><i class="fas fa-layer-group"></i></span><h3>Tu primera comunidad empieza aquí</h3><p>Crea una landing para organizar su identidad, contenido y acceso.</p><a href="{{ route('landing-pages-crear-vista') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Crear landing</a></div>
    @endforelse
</div>
@endsection
