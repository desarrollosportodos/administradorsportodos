@csrf
<div class="main-card mb-3 card">
    <div class="card-body">
        <h3 class="titulo-azul">Nuevo Tipo de Recurso o Espacio</h3>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="1">Espacio</option>
                        <option value="2">Recurso Agendable</option>
                        <option value="3">Recurso Fisico</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-secondary btn-cancel">Cancelar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div>
</div>