@extends("theme.lte.layout")
@section('titulo')
    Detalle punto de encuentro {{ $data['nombre'] }}
@endsection
@section('contenido')
<div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-box1 icon-gradient bg-night-fade">
                    </i>
                </div>
                <h1 class="titulo-general"><a href="{{ route("iniciativasolicitud") }}" >Solicitudes de iniciativas</a> / {{  $data['nombre']  }}  </h1>

            </div>
            <div class="page-title-actions">
                
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h1 class="titulo-principal">{{  $data['nombre']  }}</h1>
                @if(($data['estado'] ?? 1) == 2)<span class="badge badge-success">Aprobada</span>@elseif(($data['estado'] ?? 1) == 0)<span class="badge badge-danger">Rechazada</span>@else<span class="badge badge-warning">Pendiente de revisión</span>@endif
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>Solución</strong>
                    <div>{{  $data['solucion']  }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>Población</strong>
                    <div>{{  $data['poblacion']  }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>Fundacion</strong>
                    <div>{{  $data['fundacion']  }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>Contacto 1</strong>
                    <div>{{  $data['contacto']  }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>telefono</strong>
                    <div>{{  $data['telefono']  }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>Correo</strong>
                    <div>{{  $data['correo']  }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>Contacto 2</strong>
                    <div>{{  $data['contacto2']  }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>telefono</strong>
                    <div>{{  $data['telefono2']  }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>Correo</strong>
                    <div>{{  $data['correo2']  }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>ciudad</strong>
                    <div>{{  $data['ciudad']  }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>categoria</strong>
                    <div>{{  $data['categorianombre']  }}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    <strong>usuario</strong>
                    <div>{{  $data['usuario']  }}</div>
                    </div>
                </div>
            </div>
            @if(!empty($data['datos']))
                <hr><h4>Información ampliada de la propuesta</h4>
                <div class="row">
                    @foreach($data['datos'] as $key => $value)
                        @if(!is_array($value) && !is_bool($value) && $value !== '')
                            <div class="col-sm-6 mb-2"><strong>{{ ucfirst(str_replace(['_', '-'], ' ', $key)) }}:</strong> {{ $value }}</div>
                        @endif
                    @endforeach
                </div>
            @endif
            @if(($data['estado'] ?? 1) == 1)
                <hr>
                <div class="d-flex" style="gap:10px;">
                    <form method="POST" action="{{ route('iniciativasolicitud-aprobar', ['id' => $data['id']]) }}">@csrf<button class="btn btn-success" onclick="return confirm('¿Aprobar y publicar esta iniciativa?')"><i class="fa fa-check mr-1"></i> Aprobar y publicar</button></form>
                    <form method="POST" action="{{ route('iniciativasolicitud-rechazar', ['id' => $data['id']]) }}">@csrf<button class="btn btn-outline-danger" onclick="return confirm('¿Rechazar esta solicitud?')"><i class="fa fa-times mr-1"></i> Rechazar</button></form>
                </div>
            @elseif(!empty($data['iniciativa_creada_id']))
                <a class="btn btn-primary" href="{{ route('iniciativasolicitud-detalle', ['id' => $data['id']]) }}">Iniciativa publicada</a>
            @endif
        </div>
    </div>
   

    
@endsection

@section('scripts')

@endsection
