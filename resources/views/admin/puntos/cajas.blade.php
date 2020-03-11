<div class="row">
    @foreach ($listado as $numero => $item)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card-espacio">
                <h2>{{$item['nombre']}}</h2>
                <div class="row">
                    <div class="col-5">
                        <?php if(isset($item['foto'])){ ?>
                            <img src="{{$item['foto']}}">
                        <?php } ?>
                    </div>
                    <div class="col-7">
                        <div class="descripcion">El parque metropolitano Simón Bolívar es el más grande e importante de la ciudad por varias razones: su estratégica ubicación en el corazón de Bogotá.</div>
                    </div>
                </div>
                <hr>
                <div>
                    <div><strong>Deportes</strong></div>
                    <div class="deportes">
                        @foreach ($item['deportes'] as $deporte)
                            <i class="icon {{$deporte['icono']}}"></i>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div>
                    <div><strong>Servicios</strong></div>
                    <div class="deportes">
                        @foreach ($item['servicios'] as $servicio)
                            <i class="icon {{$servicio['icono']}}"></i>
                        @endforeach
                    </div>
                </div>
                <div class="footer-card">
                    <div class="row">
                        <div class="col-sm-8">
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
                            <a href="{{ route('puntos-detalle',[ 'id' => $item['id'] ]) }}" class="btn btn-sm btn-warning "><i class="fas fa-eye"></i></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    @endforeach
</div>