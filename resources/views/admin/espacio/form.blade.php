<div >
 <div class="card-header card-header-tab-animation">
    <ul class="nav nav-justified">
        <li class="nav-item"><a data-toggle="tab" href="#informacion" class="nav-link active show">Información</a></li>
        <li class="nav-item"><a data-toggle="tab" href="#multimedia" class="nav-link show">Multimedia</a></li>
    </ul>
</div>
<div class="card-body">
    @csrf
    <input type="hidden" name="punto" id="punto" value="<?php if(isset($punto['id'])){ echo $punto['id']; } else if(isset($data['punto_id'])) { echo $data['punto_id']; } ?>">
    <input type="hidden" name="punto_id" id="punto_id" value="<?php if(isset($punto['id'])){ echo $punto['id']; } else if(isset($data['punto_id'])) { echo $data['punto_id']; } ?>">
    <div class="tab-content">
        <div class="tab-pane active show" id="informacion" role="tabpanel">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nombre">Nombre </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data['nombre'] ?? '')}}">
                    </div>

                    <div class="form-group">
                        <label for="">Ubicación</label>
                        <div id="mappopup" class="form-map">

                        </div>
                        <input type="hidden" name="latitud" id="latitud" value="<?php if(isset($punto['latitud'])){ echo $punto['latitud']; } else if(isset($data['latitud'])) { echo $data['latitud']; } ?>">
                        <input type="hidden" name="longitud" id="longitud" value="<?php if(isset($punto['longitud'])){ echo $punto['longitud']; } else if(isset($data['longitud'])) { echo $data['longitud']; } ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="tinypopup" cols="30" rows="14"> {{old('descripcion', $data['descripcion'] ?? '')}}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Deportes</label>
                    <?php
                                $misdeportes = [];
                                if(isset($data['deportes'])){
                                    foreach ($data['deportes'] as $key => $deporte) {
                                        $misdeportes[$key] = $deporte['id'];
                                    }
                                }
                            ?>
                    <div class="row">
                        @foreach ($deportes as $deporte)
                            <div class="col-sm-12">
                                <label for="deporte{{$deporte['id']}}" class="check-group">
                                    <input class="flat-red"  type="checkbox" name="deportes[]" id="deporte{{$deporte['id']}}" value="{{$deporte['id']}}" <?php if( isset($data['deportes']) && in_array($deporte['id'],$misdeportes)){ echo "checked"; } ?> />
                                    <span>{{$deporte['nombre']}}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
        <div class="tab-pane show" id="multimedia" role="tabpanel">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nombre">Imagen Perfil</label>
                        <input type="file" name="imagen" id="imagen" class="form-control inputimage">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nombre">Imagen Portada</label>
                        <input type="file" name="portada" id="portada" class="form-control inputimage">
                    </div>
                </div>
                 <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nombre">Otras Imagenes</label>
                        <input type="file" name="imagenotras[]" multiple id="imagen" class="form-control inputimage">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<script>
    $(".inputimage").fileinput({
        language: "es",
        allowedFileExtensions: ["jpg", "png", "gif"],
        showUpload:false,
        showClose:false,
        browseOnZoneClick:true,
        dropZoneTitleClass:"input-image-pequenio",
        showBrowse: false,
        showCaption: false,
        removeIcon: '<i class="fas fa-trash"></i>',
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

