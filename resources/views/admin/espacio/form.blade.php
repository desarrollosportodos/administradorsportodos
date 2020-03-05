@csrf
<input type="hidden" name="punto" id="punto" value="<?php if(isset($punto['punto']['id'])){ echo $punto['punto']['id']; } else if(isset($data['espacio']['punto'])) { echo $data['espacio']['punto']; } ?>">
        <div class="row">
    
            <div class="col-md-12 col-lg-6">
                <div class="form-group">
                    <label for="nombre">Nombre </label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data['espacio']['nombre'] ?? '')}}">
                </div>
            </div>
        
            <div class="col-md-12 col-lg-6">
                <div class="form-group">
                    <label for="nombre">Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 ">
                <div class="form-group">
                    <label for="">Ubicación</label>
                    <div id="mappopup" class="form-map">

                    </div>
                    <input type="hidden" name="latitud" id="latitud" value="<?php if(isset($punto['punto']['latitud'])){ echo $punto['punto']['latitud']; } else if(isset($data['espacio']['latitud'])) { echo $data['espacio']['latitud']; } ?>">
                    <input type="hidden" name="longitud" id="longitud" value="<?php if(isset($punto['punto']['longitud'])){ echo $punto['punto']['longitud']; } else if(isset($data['espacio']['longitud'])) { echo $data['espacio']['longitud']; } ?>">
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="form-group">
                    <label for="">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="tinypopup" cols="30" rows="11"> {{old('descripcion', $data['espacio']['descripcion'] ?? '')}}</textarea>
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
<script>
    var mapp = new GMaps({
        div: '#mappopup',
        lat: $("#latitud").val(),
        lng: $("#longitud").val(),
    });
    mapp.addMarker({
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
    tinymce.remove('.tinypopup');
    tinymce.init({
  selector:'.tinypopup',
  language:"es",
  resize: false,
  menubar: false,
  plugins: [
      'advlist autolink lists link image charmap print preview anchor filemanager responsivefilemanager',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'formatselect | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent| link unlink  image responsivefilemanager | removeformat',
  filemanager_title:"Archivos Cargados" ,
  external_filemanager_path:"/assets/tinymce/plugins/filemanager/"
});
</script>

