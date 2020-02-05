@csrf
<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="row">
    
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="nombre">Nombre </label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data['espacio']['nombre'] ?? '')}}">
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
                    <input type="text" name="contacto" class="form-control" value="{{old('contacto', $data['espacio']['contacto'] ?? '')}}" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono" class="form-control" value="{{old('telefono', $data['espacio']['telefono'] ?? '')}}" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Correo</label>
                    <input type="text" name="correo" class="form-control" value="{{old('correo', $data['espacio']['correo'] ?? '')}}" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Ciudad</label>
                    <select name="ciudad" id="ciudad" class="form-control select2" data-value="1">
                        
                    </select>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="form-group">
                    <label for="">Zona</label>
                    <select name="zona" id="zona" class="form-control select2">
                        
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control"  value="{{old('direccion', $data['espacio']['direccion'] ?? '')}}">
                </div>
            </div>
            <div class="col-sm-12">

            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="tiny" cols="30" rows="10"> {{old('descripcion', $data['espacio']['descripcion'] ?? '')}}</textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <label for="">Servicios</label>
                <div class="row">
                    @foreach ($servicios as $servicio)
                        <div class="col-sm-3">
                            <label for="servicio{{$servicio['id']}}" class="check-group">
                                <input class="flat-red"  type="checkbox" name="servicios[]" id="servicio{{$servicio['id']}}" value="{{$servicio['id']}}" />
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
                                <input class="flat-red"  type="checkbox" name="deportes[]" id="deporte{{$deporte['id']}}" value="{{$deporte['id']}}" />
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
<script>
    $("#pais").on("change", function () {
       var pais  = $(this).val();
       $.get("/administrador/ciudades?pais="+pais,function(res){
            let dropdown = $('#ciudad');
            dropdown.empty();
            $.each(res, function (key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.id).text(entry.ciudad));
            });
       });
       console.log(pais);
    });
    $("#ciudad").on("change", function () {
       var ciudad  = $(this).val();
       $.get("/administrador/zonas?ciudad="+ciudad,function(res){
            let dropdown = $('#zona');
            dropdown.empty();
            if(JSON.stringify(res) == '{}' ){
                console.log("sin zona");
                dropdown.append($('<option></option>').attr('value',"0").text("No Aplica")); 
            } else{
                var value = $("#ciudad").data("value");
                conosle.log(value);
                $.each(res, function (key, entry) {
                    dropdown.append($('<option></option>').attr('value', entry.id).text(entry.nombre));
                });
            }
            
       });
    });

    $("#pais").trigger("change")
    
</script>
@endsection