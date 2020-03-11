@extends("theme.lte.layout")
@section('titulo')
    Detalle punto de encuentro {{ $data['punto']['nombre'] }}
@endsection
@section('contenido')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h1 class="titulo-principal">{{  $data['punto']['nombre']  }}</h1>
                <a class="btn-icon btn-icon-only btn btn-link btn-float-card" href="{{ route('puntos-editar',[ 'id' => $data['punto']['id'] ]) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
            </div>
            <div class="card-body" >
                <div class="row">
                    <div class="col-sm-3">
                        @if (isset($data['punto']['foto']))
                        <img src="{{ $data['punto']['foto'] }}" alt="" class="foto-detalle-espacio" >  
                        @endif
                        
                    </div>
                    <div class="col-sm-5">
                        <div class="descripcion">{!! $data['punto']['descripcion'] !!}</div>
                        <div class="text-left calificaciones">
                            <strong>Calificación:</strong>
                            <span> (0,0) </span>
                            <i class="pe-7s-star"></i>
                            <i class="pe-7s-star"></i>
                            <i class="pe-7s-star"></i>
                            <i class="pe-7s-star"></i>
                            <i class="pe-7s-star"></i>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div>
                            <div class="subtitulo">Deportes</div>
                            <div class="deportes">
                                @foreach ($data['deportes'] as $deporte)
                                    <i class="icon {{$deporte['icono']}}"></i>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div>
                            <div class="subtitulo">Servicios</div>
                            <div class="deportes">
                                @foreach ($data['servicios'] as $servicio)
                                    <i class="icon {{$servicio['icono']}}"></i>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <div>  
                <div class="row">
                     
                    <div class="col-sm-5">
                         <div class="subtitulo">Informacion de Contacto</div>
                         <div style="padding-left:20px;">
                         <div class="descripcion"><strong>Ciudad:</strong> {{  $data['punto']['direccion']  }} </div>
                         <div class="descripcion"><strong>Zona:</strong> {{  $data['punto']['direccion']  }} </div>
                         <div class="descripcion"><strong>Dirección:</strong> {{  $data['punto']['direccion']  }} </div>
                         <div class="descripcion"><strong>Nombre Contacto:</strong> {{  $data['punto']['contacto']  }} </div>
                         <div class="descripcion"><strong>Telefono:</strong> {{  $data['punto']['telefono']  }} </div>
                         <div class="descripcion"><strong>Correo:</strong> {{  $data['punto']['correo']  }} </div>
                         </div>
                     </div>
                     <div class="col-sm-7">
                         <div class="mapa-ubicacion" id="map">

                         </div>
                     </div>
                     

                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            
            <h3 class="subtitulo">Espacios Deportivos</h3>
            <a  data-toggle="modal" data-target="#modalUrl" class="btn-icon btn-icon-only btn btn-link btn-float-card" href="{{ route('espacio-nuevo',[ 'punto' => $data['punto']['id'] ]) }}"><i class="pe-7s-plus btn-icon-wrapper"></i></a>

            <div class="row">
            @foreach ($espacios as $item)
                <div class=" col-sm-6 col-lg-4">
                    <div class="card-espaciodetalle">
                        <div class=" botones-espacio">
                            <a data-toggle="modal" data-target="#modalUrl"  href="{{ route('espacio-detalle',[ 'id' => $item['id'] ]) }}" ><i class="pe-7s-note2"></i></a>
                            <a data-toggle="modal" data-target="#modalUrl"  href="{{ route('espacio-editar',[ 'id' => $item['id'] ]) }}" ><i class="pe-7s-pen"></i></a>
                        </div>
                        <h2>{{$item['nombre']}}</h2>
                        <div class="imagen" style="background-image:url({{$item['foto']}});"></div>
                        
                        <div>
                            <div class="deportes">
                                @foreach ($item['deportes'] as $deporte)
                                    <i class="icon {{$deporte['icono']}}"></i>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="footer-card">
                            <div>
                                <div >
                                    <div class="text-left calificaciones">
                                        <strong>Calificación:</strong>
                                        <span> (0,0) </span>
                                        <i class="pe-7s-star"></i>
                                        <i class="pe-7s-star"></i>
                                        <i class="pe-7s-star"></i>
                                        <i class="pe-7s-star"></i>
                                        <i class="pe-7s-star"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div> 
                </div>
            @endforeach
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcOinnQR34EjC7deMZkE6aKhpCeD9Bfks&sensor=true"></script>
<script src="/assets/Gmaps/gmaps.js"></script>
<script>
    var map = new GMaps({
        div: '#map',
        lat: "{{$data['punto']['latitud']}}",
        lng: "{{$data['punto']['longitud']}}",
        disableDefaultUI: true
    });
    var marker = map.addMarker({
        lat: "{{$data['punto']['latitud']}}",
        lng: "{{$data['punto']['longitud']}}",
    });
       
    

         
</script>
@endsection