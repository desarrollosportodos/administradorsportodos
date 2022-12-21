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
        </div>
    </div>
   

    
@endsection

@section('scripts')

@endsection