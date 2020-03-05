@csrf
<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="row">
    
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="nombre">Nombre </label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data['punto']['nombre'] ?? '')}}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nombre">Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>
            </div>
            <?php if(2==1){ ?>
                <div class="col-sm-4 noclaseespacio3 noclaseespacio2">
                    <div class="form-group">
                        <label for="">Pais</label>
                        <select name="pais" id="pais" class="form-control">
                            <option value="">Seleccione...</option>
                            <?php foreach ($paises as $key => $pais) { ?>
                                <?php if(isset($pais['pais_codigo'])){ ?>
                                    <option value="{{$pais['pais_codigo']}}">{{$pais['pais_nombre']}}</option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            <?php } else { ?>
                <input type="hidden" name="pais" id="pais" value="CO">
            <?php } ?>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Nombre Contacto</label>
                    <input type="text" name="contacto" class="form-control" value="{{old('contacto', $data['punto']['contacto'] ?? '')}}" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono" class="form-control" value="{{old('telefono', $data['punto']['telefono'] ?? '')}}" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Correo</label>
                    <input type="text" name="correo" class="form-control" value="{{old('correo', $data['punto']['correo'] ?? '')}}" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Ciudad</label>
                    <select name="ciudad" id="ciudad" class="form-control select2" data-value="{{old('ciudad', $data['punto']['ciudad'] ?? '')}}">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Zona</label>
                    <select name="zona" id="zona" class="form-control select2" data-value="{{old('zona', $data['punto']['zona'] ?? '')}}">
                        
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control"  value="{{old('direccion', $data['punto']['direccion'] ?? '')}}">
                </div>
                <input type="hidden" name="latitud" id="latitud" value="{{old('latitud', $data['punto']['latitud'] ?? '')}}">
                <input type="hidden" name="longitud" id="longitud" value="{{old('longitud', $data['punto']['longitud'] ?? '')}}">
            </div>
            <div class="col-sm-8 ">
                <div id="map" class="form-map">

                </div>
            </div>

            <div class="col-sm-12">

            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="tiny" cols="30" rows="10"> {{old('descripcion', $data['punto']['descripcion'] ?? '')}}</textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <label for="">Servicios</label>
                <div class="row">
                    @foreach ($servicios as $servicio)
                        <div class="col-sm-3">
                            <label for="servicio{{$servicio['id']}}" class="check-group">
                                <input class="flat-red"  type="checkbox" name="servicios[]" id="servicio{{$servicio['id']}}" value="{{$servicio['id']}}" <?php if(isset($data['servicios']) && in_array($servicio['id'],$data['servicios'])){ echo "checked"; } ?> />
                                <span>{{$servicio['nombre']}}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-12">
                <label for="">Deportes</label>
                <div class="row">
                    @foreach ($deportes as $deporte)
                        <div class="col-sm-3">
                            <label for="deporte{{$deporte['id']}}" class="check-group">
                                <input class="flat-red"  type="checkbox" name="deportes[]" id="deporte{{$deporte['id']}}" value="{{$deporte['id']}}" <?php if( isset($data['deportes']) && in_array($deporte['id'],$data['deportes'])){ echo "checked"; } ?> />
                                <span>{{$deporte['nombre']}}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>



    
        </div>
    </div>
</div>

@section('scripts')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcOinnQR34EjC7deMZkE6aKhpCeD9Bfks&sensor=true"></script>
<script src="/assets/Gmaps/gmaps.js"></script>
<script>
    var map = new GMaps({
        div: '#map',
        lat: $("#latitud").val(),
        lng: $("#longitud").val(),
    });
    var marker = map.addMarker({
        lat: $("#latitud").val(),
        lng: $("#longitud").val(),
        draggable: true,
        dragend: function(event) {
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            $("#latitud").val(lat);
            $("#longitud").val(lng);
        },
    });
       
    function actualizar(){
        GMaps.geocode({
            address: $('#ciudad option:selected').text()+","+$("#direccion").val()+","+$('#zona option:selected').text(),
            callback: function(results, status) {
                if (status == 'OK') {
                    var latlng = results[0].geometry.location;
                    map.setCenter(latlng.lat(), latlng.lng());
                    marker.setPosition(latlng);
                    $("#latitud").val(latlng.lat());
                    $("#longitud").val(latlng.lng());
                }
            }
        });
    }

    $("#direccion").on("keyup",function(){
        actualizar();
    });     
</script>
<script>
    $("#pais").on("change", function () {
       var pais  = $(this).val();
       $.get("/administrador/ciudades?pais="+pais,function(res){
            let dropdown = $('#ciudad');
            dropdown.empty();
            var value = $('#ciudad').data("value");
            console.log(value);
            $.each(res, function (key, entry) {
                if(parseInt(value) == parseInt(entry.id) ){
                    dropdown.append($('<option selected></option>').attr('value', entry.id).text(entry.nombre));
                } else {
                    dropdown.append($('<option></option>').attr('value', entry.id).text(entry.nombre));
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
    
    
</script>
@endsection