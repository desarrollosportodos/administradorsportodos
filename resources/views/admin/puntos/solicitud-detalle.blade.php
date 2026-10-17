@extends("theme.lte.layout")
@section('titulo', 'Detalle de solicitud')
@section('contenido')
<style>
 .request-detail{border:0;border-radius:18px;overflow:hidden;box-shadow:0 10px 30px rgba(22,45,90,.1)} .request-detail__hero{min-height:220px;background:#10244a;position:relative} .request-detail__hero img{width:100%;height:100%;min-height:220px;object-fit:cover} .request-detail__body{padding:28px} .request-field{padding:14px 16px;border:1px solid #e2e9f3;border-radius:12px;height:100%;background:#fbfcff}.request-field small{display:block;color:#75839b;text-transform:uppercase;font-size:10px;font-weight:700;letter-spacing:.1em}.request-field strong{display:block;color:#182743;margin-top:6px;word-break:break-word}.request-actions{display:flex;gap:10px;flex-wrap:wrap;padding-top:20px;border-top:1px solid #e8edf5;margin-top:24px}
</style>
<div class="mb-3"><a href="{{ route('puntos-solicitudes') }}" class="btn btn-light"><i class="fa fa-arrow-left mr-1"></i> Solicitudes</a></div>
<div class="card request-detail">
    <div class="request-detail__hero">@if(!empty($data['portada'] ?? $data['foto']))<img src="{{ $data['portada'] ?? $data['foto'] }}" alt="{{ $data['nombre'] ?? 'Espacio' }}">@endif</div>
    <div class="request-detail__body">
        <div class="d-flex justify-content-between align-items-start flex-wrap"><div><span class="text-success font-weight-bold text-uppercase small">Solicitud de espacio</span><h1 class="mt-2">{{ $data['nombre'] ?? 'Sin nombre' }}</h1></div><span class="badge badge-warning p-2">{{ ucfirst($data['estado'] ?? 'pendiente') }}</span></div>
        <div class="row mt-3">
            @foreach(['direccion'=>'Dirección','contacto'=>'Contacto','telefono'=>'Teléfono','correo'=>'Correo','ciudad_id'=>'Ciudad','zona_id'=>'Zona','descripcion'=>'Descripción'] as $key => $label)
                <div class="col-md-6 mb-3"><div class="request-field"><small>{{ $label }}</small><strong>{{ $data[$key] ?? 'No especificado' }}</strong></div></div>
            @endforeach
            <div class="col-12 mb-3"><div class="request-field"><small>Deportes propuestos</small><strong>
                @forelse(($data['deportes_detalle'] ?? []) as $deporte)<span class="badge badge-info mr-1">{{ $deporte['nombre'] }}</span>@empty No especificados @endforelse
            </strong></div></div>
        </div>
        <div class="request-actions">
            @if(($data['estado'] ?? 'pendiente') === 'pendiente')
                <form method="POST" action="{{ route('puntos-solicitud-aprobar', ['id' => $data['id']]) }}">@csrf<button class="btn btn-success" onclick="return confirm('¿Aprobar y publicar este espacio?')"><i class="fa fa-check mr-1"></i> Aprobar y publicar</button></form>
                <form method="POST" action="{{ route('puntos-solicitud-rechazar', ['id' => $data['id']]) }}">@csrf<button class="btn btn-outline-danger" onclick="return confirm('¿Rechazar esta solicitud?')"><i class="fa fa-times mr-1"></i> Rechazar</button></form>
            @elseif(!empty($data['punto_creado_id'])) <a href="{{ route('puntos-detalle', ['id' => $data['punto_creado_id']]) }}" class="btn btn-primary">Ver espacio publicado</a>
            @endif
        </div>
    </div>
</div>
@endsection
