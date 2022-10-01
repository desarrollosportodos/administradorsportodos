@extends("theme.lte.layout")
@section('titulo')
Gestion de Salas
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-box1 icon-gradient bg-night-fade">
                </i>
            </div>
            <div>Gestion de Salas
                <div class="page-title-subheading">aca podras separar cada una de las salas o espcaios para tus clientes
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
    <div class="caja-fecha-reserva">
        <div class="row no-gutters">
            <div class="col-sm-5">
                <label for="fecha-reserva">Fecha de Reserva</label>
            </div>
            
            <div id="app" class="col-sm-6">
                    <datetime type="date" v-model="date" input-id="fecha-reserva" format="yyyy-MM-dd" zone="America/Bogota" value-zone="America/Bogota" v-model="defaultDate"></datetime>
                </div>
            <div class="col-sm-1">
                    <label class="buscar"><i class="fa fa-search"></i></label>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
        @foreach ($listado as $item)
            <form action="{{ route('calendario-reservas-recursos',[ 'id' => $item['detalle']['id'] ]) }}" method="POST" id="formularioreserva{{ $item['detalle']['id']}}">
                @csrf
                <input type="hidden" name="fecha" value="{{ $fecha }}">
                <div class="elementocalendario" data-id="{{ $item['detalle']['id']}}">
                    <h3 class="titulo-reserva">{{ $item['detalle']['nombre']}}
                        <div class="elementos">
                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Capacidad">
                                <i class="pe-7s-users"></i>
                                {{ $item['detalle']['persona']}}
                            </span>
                            <?php if($item['detalle']['tv'] == 1){ ?>
                                <span data-toggle="tooltip" data-placement="top" title="" data-original-title="TV">
                                    <i class="pe-7s-display1"></i>
                                </span>
                            <?php } ?>
                            <?php if($item['detalle']['videobean'] == 1){ ?>
                                <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Video Bean">
                                    <i class="pe-7s-video"></i>
                                </span>
                            <?php } ?>
                            <?php if($item['detalle']['teleconferencia'] == 1){ ?>
                                <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Teleconferencia">
                                    <i class="pe-7s-headphones"></i>
                                </span>
                            <?php } ?>
                        </div>
                    </h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="imagen">
                                <img src="{{ $item['detalle']['imagen']}}" alt="">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="descripcion">{!! $item['detalle']['descripcion']!!}</div>
                        </div>
                    </div>
                    <h5 class="subtitulo-reserva">Selecciona las horas que deseas reservar</h5>
                    <div class='carousel_container' id="carousel-horas{{$item['detalle']['id']}}">
                        <div class='left_scroll'><i class="fa fa-angle-left"></i></div>
                        <div class="scrollcarousel_inner">
                            <ul class="calendario-reserva">
                                @foreach ($item['horas'] as $key => $hora)
                                    <li>
                                    <input type="checkbox" data-id="{{$item['detalle']['id']}}" id="{{$item['detalle']['id']}}hora{{$key}}" name="horas[]" value="{{$key}}" <?php if( $hora == 0){echo 'disabled' ;} ?> >
                                        <label for="{{$item['detalle']['id']}}hora{{$key}}" class="<?php if( $hora == 0){echo 'ocupada' ;} ?>">
                                            <div><?php echo date("h",strtotime($key)); ?></div>
                                            <div><?php echo date("i",strtotime($key)); ?></div>
                                            <div><strong><?php echo date("A",strtotime($key)); ?></strong></div>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class='right_scroll'><i class="fa fa-angle-right"></i></div>
                    </div>
                    <div id="horasselecionadas{{$item['detalle']['id']}}" class="horasselecionadas"></div>
                    <div class="row row align-items-center">
                        <div class="col-sm-2">
                            <label for="">Asignar a:</label>
                            
                        </div>
                        <div class="col-sm-5">
                            <select name="usuario" id="usuario" class="form-control form-control-sm">
                                @foreach ($usuarios as $key => $usuario)
                                    <option value="{{$key}}">{{$usuario}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Reservar</button>
                            </div>
                        </div>
                    </div>
                    
                    <br>
                </div>
            </form>
        @endforeach
    </div>
</div>
@endsection

@section('styles')
    <link rel="stylesheet" href="/assets/scrollcarousel/scrollcarousel.css">
@endsection

@section('scripts')
    <script src="/assets/scrollcarousel/scrollcarousel.js"></script>
    <script src="/assets/vue-datetime/app.js"></script>
    <script>
        $(".carousel_container").scrollcarousel({
            pause : 4000,
            quantity : 16,
            auto: 'false',
            sizes : {
                '900' : 8,
                '500' : 4 
            }
        });
        $("#fecha-reserva").val("{{ $fecha }}");

        $(".buscar").on("click",function(){
            console.log("entro");
            var value = $("#fecha-reserva").val();
            top.location.href = "/administrador/recursos/gestion/salas?fecha="+value;
        });

        $(".carousel_container input").on("change",function(){
            var valores = "";
            var id = $(this).data("id");
            $("#carousel-horas"+id+" input:checked").each(function(){
                valores = valores+"<span>"+formattime($(this).val())+"</span>"
                
            });

            function formattime(fecha){
                var date = new Date("2020 "+fecha);
                if (date.getHours()>=12){
                    var hour = parseInt(date.getHours()) - 12;
                    var amPm = "PM";
                } else {
                    var hour = date.getHours();
                    var amPm = "AM";
                }

                if(parseInt(hour)< 10){
                    hour = "0"+hour;
                }
                min = date.getMinutes();
                if(parseInt(min)< 10){
                    min = "0"+min;
                }
                var date = hour + ":" + min+ " " + amPm;
                return date;
            }
            $("#horasselecionadas"+id).html(valores);
        });


    </script>

@endsection