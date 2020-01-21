@csrf
<div class="main-card mb-3 card">
    <div class="card-body">
        <h2 class="titulo-azul">Informacion del Cliente</h2>
        <input type="hidden" name="registro_sitio" value="49">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Nombre Del Cliente</label>
                    <input type="text" name="registro_nombre" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Tipo </label>
                    <select class="form-control" name="registro_tipo" id="registro_tipo">
                        <option value="1" selected>Independiente</option>
                        <option value="2">Negocio</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
            <div class="form-group">
                    <label for="">Categoria </label>
                    <select class="form-control" name="registro_categoria" id="registro_categoria">
                        <option value="">Seleccione</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria['categoria_id']}}" class="tipo tipo{{$categoria['categoria_tipo']}}" style="display:none;" >{{html_entity_decode($categoria['categoria_nombre'])}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <h2 class="titulo-azul">Datos de Contacto</h2>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="">Tipo de Identificacion </label>
                    <select class="form-control" name="user_typepople" id="user_typepople">
                        <option value="">Persona Natural</option>
                        <option value="">Persona Juridica</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label for="">Identificacion</label>
                    <select class="form-control" name="user_typeid" id="user_typeid">
                        <option value="">CC</option>
                        <option value="">CE</option>
                        <option value="">PP</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">No.</label>
                    <input type="text" name="user_idnumber" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Nombres</label>
                    <input type="text" name="user_names" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input type="text" name="user_lastnames" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Correo</label>
                    <input type="text" name="user_email" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="user_password" class="form-control" >
                </div>
            </div>
            <div class="col-sm-12">
                <h2 class="titulo-azul">Personas Con acceso</h2>
            </div>

            <div class="col-sm-1">
                1
            </div>
            <div class="col-sm-2">
                <label for="">Nombres</label>
                <input type="text" name="user_names1" class="form-control">
            </div>
            <div class="col-sm-2">
                <label for="">Apellidos</label>
                <input type="text" name="user_lastnames1" class="form-control">
            </div>
            <div class="col-sm-2">
                <label for="">Correo</label>
                <input type="text" name="user_lastnames1" class="form-control">
            </div>
            
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                   <button type="submit" class="btn btn-block btn-success">Guardar</button>
                </div>
            </div>

        </div>
    </div>
</div>
