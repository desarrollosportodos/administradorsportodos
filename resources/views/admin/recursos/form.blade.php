@csrf
<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
            </div>
            <div class="col-sm-2 text-right">
                <input name="estado" type="checkbox" data-toggle="toggle" data-on="Activo" data-off="Inactivo" value="1"
                    data-onstyle="success" data-style="quick"
                    <?php if( isset($data['estado']) && $data['estado'] == 1){ echo "checked"; } ?>>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Clase</label>
                    <select name="clase" id="claseespacio" class="form-control">
                        @foreach ($tipos as $tipo)
                        <option value="{{$tipo['id']}}" data-tipo="{{$tipo['tipo']}}"
                            <?php if(isset($data['clase']) && $data['clase'] == $tipo['id']  ){ echo "selected"; }  ?>>
                            {{$tipo['nombre']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="nombre">Nombre / Tipo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        placeholder="PE: Oficina 3 puestos" value="{{old('nombre', $data['nombre'] ?? '')}}">
                </div>
            </div>
            <div class="col-sm-3 noclaseespacio3 ">
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" min="1"
                        value="{{old('cantidad', $data['cantidad'] ?? '1')}}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Creditos</label>
                    <input type="text" name="creditos" class="form-control"
                        value="{{old('creditos', $data['creditos'] ?? '')}}">
                </div>
            </div>
            <div class="col-sm-3 noclaseespacio3 noclaseespacio2">
                <div class="form-group">
                    <label for="">Alquiler de Espacio</label>
                    <select name="alquiler" id="" class="form-control">
                        <option value="1"
                            <?php if(isset($data['alquiler']) && $data['alquiler'] == 1  ){ echo "selected"; }  ?>>
                            Mensual</option>
                        <option value="2"
                            <?php if(isset($data['alquiler']) && $data['alquiler'] == 2  ){ echo "selected"; }  ?>>Horas
                        </option>
                    </select>
                </div>
            </div>


            <div class="col-sm-3 noclaseespacio3 noclaseespacio2">
                <div class="form-group">
                    <label for="">Asignacion personas</label>
                    <select name="asignacion" id="" class="form-control">
                        <option value="1"
                            <?php if(isset($data['asignacion']) && $data['asignacion'] == 1  ){ echo "selected"; }  ?>>
                            Aplica</option>
                        <option value="2"
                            <?php if(isset($data['asignacion']) && $data['asignacion'] == 2  ){ echo "selected"; }  ?>>
                            No Aplica</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3 noclaseespacio3 noclaseespacio2">
                <div class="form-group">
                    <label for="">Capacidad</label>
                    <input type="text" name="persona" class="form-control"
                        value="{{old('persona', $data['persona'] ?? '')}}">
                </div>
            </div>
            <div class="col-sm-3 noclaseespacio3 ">
                <div class="form-group">
                    <label for="">Capacidad</label>
                    <input type="text" name="persona" class="form-control"
                        value="{{old('persona', $data['persona'] ?? '')}}">
                </div>
            </div>
            <div class="col-sm-12">
                <input type="file" name="imagen" id="imagen" class="file-uploadimage" accept="image/*">
                <?php if(isset($data) && $data['imagen']){ ?>
                    <img src="{{$data['imagen']}}" id="previewimagen" class="miniatura">
                <?php } ?>
            </div>
            <div class="col-sm-12 ">
                <div class="form-group">
                    <label for="">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="tiny" cols="30" rows="10">{{old('descripcion', $data['descripcion'] ?? '')}}</textarea>
                </div>
            </div>
            <div class="col-sm-4 noclaseespacio3">
                <label for="">TV</label>
                <input name="tv" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" value="1"
                    data-onstyle="primary" data-style="quick"
                    <?php if( isset($data['tv']) && $data['tv'] == 1){ echo "checked"; } ?>>
            </div>
            <div class="col-sm-4 noclaseespacio3">
                <label for="">Video Bean</label>
                <input name="videobean" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" value="1"
                    data-onstyle="primary" data-style="quick"
                    <?php if( isset($data['videobean']) && $data['videobean'] == 1){ echo "checked"; } ?>>
            </div>
            <div class="col-sm-4 noclaseespacio3">
                <label for="">Teleconferencia</label>
                <input name="teleconferencia" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" value="1"
                    data-onstyle="primary" data-style="quick"
                    <?php if( isset($data['teleconferencia']) && $data['teleconferencia'] == 1){ echo "checked"; } ?>>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $("#claseespacio").on("change", function () {
        var tipo = $(this).find(':selected').data('tipo');
        if (parseInt(tipo) == 3) {
            $(".noclaseespacio2").show();
            $(".noclaseespacio3").hide();
        } else if (parseInt(tipo) == 2) {
            $(".noclaseespacio3").show();
            $(".noclaseespacio2").hide();
        } else {
            $(".noclaseespacio3").show();
            $(".noclaseespacio2").show();
        }
        console.log(tipo);
    });
    $("#claseespacio").trigger("change");

    $(".file-uploadimage").each(function () {
        var id = $(this).attr("id");
        $(this).after("<label for='" + id + "' class='label-file-uploadimage' ><span></span> <div class='btn'>Selecciona la Imagen</div> </label>");
    });
    $('.file-uploadimage').change(function (e) {
        if (e.target.files[0]) {
            var id = $(this).attr("id");
            var fileName = e.target.files[0].name;
            $(this).siblings('label').find("span").html(fileName);
            if ($("#preview" + id).length == 0) {
                $(this).siblings('label').after("<img src='' id='preview" + id + "' class='miniatura' />");
            }
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("preview" + id).src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        } else {
            $(this).siblings('label').find("span").html("");
            $(this).siblings("img").remove();
        }
    });
</script>
@endsection