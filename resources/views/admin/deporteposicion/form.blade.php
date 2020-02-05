@csrf
<div class="main-card mb-3 card">
    <div class="card-body">
        <h3 class="titulo-azul">Nueva Posicion</h3>
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="deporte">Deporte</label>
                    <select name="deporte" id="deporte" required class="form-control">
                        <option value="">Seleccione</option>
                        @foreach ($deportes as $id => $deporte)
                            <option value="{{$id}}">{{$deporte}}</option>
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