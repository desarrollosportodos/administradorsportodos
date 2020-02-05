@csrf
<div class="main-card mb-3 card">
    <div class="card-body">
        <h3 class="titulo-azul">Nueva Barrera</h3>
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="tipo">tipo</label>
                    <select name="tipo" id="tipo" required class="form-control">
                        <option value="">Seleccione</option>
                        @foreach ($tipos as $id => $tipo)
                            <option value="{{$id}}">{{$tipo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-secondary btn-cancel">Cancelar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div>
</div>