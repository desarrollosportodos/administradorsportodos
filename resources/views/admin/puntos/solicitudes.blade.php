@extends("theme.lte.layout")
@section('titulo', 'Solicitudes de espacios')
@section('contenido')
<style>
    .request-hero { border-radius: 18px; padding: 24px 28px; color: #fff; background: linear-gradient(120deg,#142c59,#0d172e); box-shadow: 0 12px 30px rgba(22,45,90,.18); }
    .request-hero small { color:#36df99; font-weight:700; letter-spacing:.14em; text-transform:uppercase; }
    .request-card { height:100%; border:1px solid #dce5f2; border-radius:16px; overflow:hidden; background:#fff; box-shadow:0 8px 24px rgba(23,43,77,.08); }
    .request-card__media { height:150px; background:linear-gradient(135deg,#152d5a,#09152e); }
    .request-card__media img { width:100%; height:100%; object-fit:cover; }
    .request-card__body { padding:20px; }
    .request-pill { display:inline-flex; padding:5px 10px; border-radius:999px; font-size:11px; font-weight:700; background:#fff1df; color:#d97706; }
    .request-pill.aprobada { background:#dcfce9; color:#14804b; } .request-pill.rechazada { background:#fee2e2; color:#b42318; }
    .request-meta { color:#74829a; font-size:13px; margin-top:9px; } .request-card h3 { margin:12px 0 0; color:#16223d; font-weight:800; }
</style>
<div class="request-hero mb-4">
    <small>Gestión de espacios</small>
    <h1 class="mt-2 mb-1">Solicitudes de nuevos espacios</h1>
    <p class="mb-0">Revisa cada propuesta y publícala únicamente cuando la información esté validada.</p>
</div>
@if(session('mensaje')) <div class="alert alert-success">{{ session('mensaje') }}</div> @endif
@if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
<div class="card border-0 shadow-sm mb-4"><div class="card-body">
    <form class="form-inline" method="GET">
        <label class="mr-2 font-weight-bold">Estado</label>
        <select name="estado" class="form-control mr-2">
            <option value="">Todas</option><option value="pendiente" {{ request('estado') === 'pendiente' ? 'selected' : '' }}>Pendientes</option>
            <option value="aprobada" {{ request('estado') === 'aprobada' ? 'selected' : '' }}>Aprobadas</option><option value="rechazada" {{ request('estado') === 'rechazada' ? 'selected' : '' }}>Rechazadas</option>
        </select><button class="btn btn-primary">Filtrar</button>
    </form>
</div></div>
<div class="row">
@forelse($listado as $item)
    <div class="col-md-6 col-xl-4 mb-4"><div class="request-card">
        <div class="request-card__media">@if(!empty($item['portada'] ?? $item['foto']))<img src="{{ $item['portada'] ?? $item['foto'] }}" alt="{{ $item['nombre'] }}">@endif</div>
        <div class="request-card__body"><span class="request-pill {{ $item['estado'] ?? 'pendiente' }}">{{ ucfirst($item['estado'] ?? 'pendiente') }}</span>
            <h3>{{ $item['nombre'] }}</h3><div class="request-meta"><i class="fa fa-map-marker mr-1"></i>{{ $item['direccion'] ?? 'Dirección pendiente' }}</div>
            <div class="request-meta"><i class="fa fa-user mr-1"></i>{{ data_get($item, 'solicitante.user_names', 'Usuario') }} {{ data_get($item, 'solicitante.user_lastnames', '') }}</div>
            <a href="{{ route('puntos-solicitud-detalle', ['id' => $item['id']]) }}" class="btn btn-primary btn-block mt-3">Ver detalle y revisar <i class="fa fa-arrow-right ml-1"></i></a>
        </div>
    </div></div>
@empty <div class="col-12"><div class="alert alert-info">No hay solicitudes para este filtro.</div></div> @endforelse
</div>
@endsection
