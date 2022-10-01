@csrf
<div class="mb-3 card">
    <div class="card-header card-header-tab-animation">
        <ul class="nav  nav-justified">
            <li class="nav-item"><a data-toggle="tab" href="#informacion" class="nav-link active show">Información</a></li>
            <li class="nav-item"><a data-toggle="tab" href="#multimedia" class="nav-link show">Multimedia</a></li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active show" id="informacion" role="tabpanel">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Nombre </label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data['nombre'] ?? '')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Categoria</label>
                            <select name="categoria" id="categoria" class="form-control">
                                <option value="0">Seleccione...</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria['id']}}" <?php if(isset($data['categoria']) && $categoria['id'] ==  $data['categoria'] ){echo "selected";} ?>>{{$categoria['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Fecha de publicación</label>
                            <input type="date" name="fecha_publicacion" class="form-control" value="{{old('fecha_publicacion', $data['fecha_publicacion'] ?? date("Y-m-d"))}}" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Fundacion</label>
                            <input type="text" name="fundacion" class="form-control" value="{{old('fundacion', $data['fundacion'] ?? '')}}" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nombre">Ciudad</label>
                            <select name="ciudad_id" id="ciudad_id" class="form-control">
                                <option value="0">Seleccione...</option>
                                @foreach ($ciudades as $ciudad)
                                    <option value="{{$ciudad['id']}}" <?php if(isset($data['ciudad_id']) && $ciudad['id'] ==  $data['ciudad_id'] ){echo "selected";} ?>>{{$ciudad['ciudad']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="text" name="telefono" class="form-control" value="{{old('telefono', $data['telefono'] ?? '')}}" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Correo</label>
                            <input type="text" name="email" class="form-control" value="{{old('email', $data['email'] ?? '')}}" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nombre">Deporte</label>
                            <select name="deporte_id" id="deporte_id" class="form-control">
                                <option value="0">Seleccione...</option>
                                @foreach ($deportes as $deporte)
                                    <option value="{{$deporte['id']}}" <?php if(isset($data['deporte_id']) && $deporte['id'] ==  $data['deporte_id'] ){echo "selected";} ?>>{{$deporte['nombre']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Objetivo</label>
                            <input type="text" name="objetivo" class="form-control" value="{{old('objetivo', $data['objetivo'] ?? '')}}" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea name="descripcion" id="descripcion" class="tiny" cols="30" rows="10"> {{old('descripcion', $data['descripcion'] ?? '')}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Metodologia</label>
                            <textarea name="metodologia" id="metodologia" class="tiny" cols="30" rows="10"> {{old('metodologia', $data['metodologia'] ?? '')}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Resultados</label>
                            <textarea name="resultados" id="resultados" class="tiny" cols="30" rows="10"> {{old('resultados', $data['resultados'] ?? '')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane show" id="multimedia" role="tabpanel">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="foto">Imagen Perfil </label>
                            <input type="file" name="foto" id="foto" class="form-control inputimage">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="portada">Imagen Portada</label>
                            <input type="file" name="portada" id="portada" class="form-control inputimage">
                        </div>
                    </div>
                     <div class="col-sm-12">
                        <div class="form-group">
                            <label for="nombre">Otras Imagenes</label>
                            <input type="file" name="imagenotras[]" multiple id="imagenes" class="form-control inputimage">
                        </div>
                    </div>
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
                console.log(entry);
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
    
    $("#foto").fileinput({
    language: "es",
    allowedFileExtensions: ["jpg", "png", "gif","jpeg"],
    showUpload:false,
    showClose:false,
    browseOnZoneClick:true,
    dropZoneTitleClass:"input-image-pequenio",
    showBrowse: false,
    showCaption: false,
    removeIcon: '<i class="fas fa-trash"></i>',
    deleteIcon: '<i class="fas fa-trash"></i>',
    <?php if( isset($data['foto'])){ ?>
        initialPreviewAsData: true,
        initialPreview: [
            "<?php echo $data['foto'];?>"
        ],
        initialPreviewConfig: [
            {url:"/administrador/puntos/eliminarimagen?imagen=<?php echo $data['foto'];?>&punto=<?php echo $data['id'];?>"}
        ],
    <?php } ?>
    layoutTemplates: {
	    footer: '<div class="text-right">\n' +
	            '   {actions}\n' +
	            '</div>',
	    actions: '<div class="file-actions">\n' +
	            '    <div class="file-footer-buttons">\n' +
	            '        {delete}' +
	            '    </div>\n' +
	            '</div>'
	},
});
$("#portada").fileinput({
    language: "es",
    allowedFileExtensions: ["jpg", "png", "gif","jpeg"],
    showUpload:false,
    showClose:false,
    browseOnZoneClick:true,
    dropZoneTitleClass:"input-image-pequenio",
    showBrowse: false,
    showCaption: false,
    removeIcon: '<i class="fas fa-trash"></i>',
    <?php if( isset($data['portada'])){ ?>
        initialPreviewAsData: true,
        initialPreview: [
            "<?php echo $data['portada'];?>"
        ],
        initialPreviewConfig: [
            {url:"/administrador/puntos/eliminarimagen?imagen=<?php echo $data['portada'];?>&punto=<?php echo $data['id'];?>"}
        ],
    <?php } ?>
    layoutTemplates: {
	    footer: '<div class="text-right">\n' +
	            '   {actions}\n' +
	            '</div>',
	    actions: '<div class="file-actions">\n' +
	            '    <div class="file-footer-buttons">\n' +
	            '        {delete}' +
	            '    </div>\n' +
	            '</div>'
	},
});

$("#imagenes").fileinput({
    language: "es",
    allowedFileExtensions: ["jpg", "png", "gif","jpeg"],
    showUpload:false,
    showClose:false,
    browseOnZoneClick:true,
    dropZoneTitleClass:"input-image-pequenio",
    showBrowse: false,
    showCaption: false,
    removeIcon: '<i class="fas fa-trash"></i>',
    <?php if( isset($data['fotos'])){ ?>
        initialPreviewAsData: true,
        initialPreview: [
            <?php foreach ($data['fotos'] as $key => $foto) {?>
            "<?php echo $foto['imagen'];?>",
            <?php } ?>
        ],
        initialPreviewConfig: [
            <?php foreach ($data['fotos'] as $key => $foto) {?>
            {url:"/administrador/puntos/eliminarimagen?imagen=<?php echo $foto['imagen'];?>&idimagen=<?php echo $foto['id'];?>"},
            <?php } ?>
           
        ],
    <?php } ?>
    layoutTemplates: {
	    footer: '<div class="text-right">\n' +
	            '   {actions}\n' +
	            '</div>',
	    actions: '<div class="file-actions">\n' +
	            '    <div class="file-footer-buttons">\n' +
	            '        {delete}' +
	            '    </div>\n' +
	            '</div>'
	},
});
    
</script>
@endsection