@csrf
<div class="main-card mb-3 card">
    <div class="card-body">
        <h3 class="titulo-azul">Nuevo Deporte</h3>
        <div class="row">

            <div class="col-sm-8">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="icono">icono <a href="https://togroow.com/scripts/iconos/demo.html" target="_blank" style="font-size:10px;">(Listado)</a></label>
                    <input type="text" name="icono" id="icono" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="tipo">Por Equipos</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="0">Si</option>
                        <option value="1">No</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="minimo">Minimo jugadores</label>
                    <input type="text" name="minimo" id="minimo" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="maximo">Maximo jugadores</label>
                    <input type="text" name="maximo" id="maximo" class="form-control">
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-secondary btn-cancel">Cancelar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div>
</div>