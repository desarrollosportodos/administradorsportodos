@extends("theme.lte.layout")
@section('titulo')
Puntos de encuentro
@endsection
@section('contenido')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-box1 icon-gradient bg-night-fade">
                    </i>
                </div>
                <h1 class="titulo-general">Gestion de Puntos de encuentro</h1>

            </div>
            <div class="page-title-actions">
                
            </div>
        </div>
    </div>

    <div class="intro-general">Aconticunación encontraras el listado de los puntos deportivos, podras gestionar y visualizar el detalle de cada uno de ellos.
                    </div>
    <div class="text-right">
        <a data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow btn btn-success" data-original-title="Nuevo Espacio o Recurso" href="{{ route("puntos-nuevo") }}"> <i class="fa fa-plus"></i> </a>
        <button class="btn btn-info" id="tipo_listado"><i class="fas fa-list-ul"></i></button>
        <button class="btn btn-info" id="tipo_cajas"><i class="fas fa-th"></i></button>
    </div>
    <br>
    <div class="card">
        <form id="filtros-puntos" class="card-body">
            <input type="hidden" name="pais_id" id="pais" value="CO">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">Ciudad</label>
                        <select name="ciudad_id" id="ciudad" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">Zona</label>
                        <select name="zona_id" id="zona" class="form-control" data-value="{{old('zona', $data['zona_id'] ?? '')}}"></select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Deporte</label>
                        <select name="deporte" id="deporte" class="form-control" data-value="{{old('deporte', $data['deporte'] ?? '')}}">
                            <option value="">Seleccione...</option>
                            @foreach ($deportes as $deporte)
                                <option value="{{$deporte['id']}}">{{$deporte['nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Servicios</label>
                        <select name="servicio" id="servicio" class="form-control" data-value="{{old('servicio', $data['servicio'] ?? '')}}">
                            <option value="">Seleccione...</option>
                            @foreach ($servicios as $servicio)
                                <option value="{{$servicio['id']}}">{{$servicio['nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">&nbsp;</label>
                        <button type="submit" class="btn btn-block btn-success">Filtrar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div id="listado"></div>
@endsection

@section('scripts')
<script>
    $("#tipo_listado").on("click",function(){
        var data = $("#filtros-puntos").serialize();
        $(this).attr("disabled", true);
        $("#tipo_cajas").removeAttr("disabled");;
        $("#listado").stop().load("/administrador/puntos/listado?"+data);
    });
    $("#tipo_cajas").on("click",function(){
        var data = $("#filtros-puntos").serialize();
        $(this).attr("disabled", true);
        $("#tipo_listado").removeAttr("disabled");;
        $("#listado").stop().load("/administrador/puntos/listadocajas?"+data);
    });
    $("#tipo_cajas").trigger("click");

    $("#pais").on("change", function () {
       var pais  = $(this).val();
       $.get("/administrador/ciudades?pais="+pais,function(res){
            let dropdown = $('#ciudad');
            dropdown.empty();
            var value = $('#ciudad').data("value");
            //console.log(value);
            dropdown.append($('<option></option>').attr('value',"0").text("Seleccione...")); 
            $.each(res, function (key, entry) {
                //console.log(entry);
                if(parseInt(value) == parseInt(entry.id) ){
                    dropdown.append($('<option selected></option>').attr('value', entry.id).text(entry.ciudad));
                } else {
                    dropdown.append($('<option></option>').attr('value', entry.id).text(entry.ciudad));
                }
                
            });
            traerciudad();
       });
    });

    function traerciudad(){
        var ciudad  = $("#ciudad").val();
        $.get("/administrador/zonas?ciudad="+ciudad,function(res){
            let dropdown = $('#zona');
            dropdown.empty();
            if(JSON.stringify(res) == '{}' ){
                dropdown.append($('<option></option>').attr('value',"0").text("No Aplica")); 
            } else{
                var value = $('#zona').data("value");
                dropdown.append($('<option></option>').attr('value',"0").text("Seleccione...")); 
                $.each(res, function (key, entry) {
                    if(parseInt(value) == parseInt(entry.id) ){
                        dropdown.append($('<option selected></option>').attr('value', entry.id).text(entry.nombre));
                    } else {
                        dropdown.append($('<option></option>').attr('value', entry.id).text(entry.nombre));
                    }
                });
            }
            
       });
    }
    $("#ciudad").on("change", function () {
       traerciudad();
       actualizar();       
    });
    $("#zona").on("change", function () {
       actualizar();
    });

    $("#pais").trigger("change");

    $("#filtros-puntos").submit(function(){
        var data = $("#filtros-puntos").serialize();
        if($("#tipo_cajas").is(":disabled")){
            $("#listado").stop().load("/administrador/puntos/listadocajas?"+data);
        } else {
            $("#listado").stop().load("/administrador/puntos/listado?"+data);
        }

        
        return false;
    });
</script>
@endsection