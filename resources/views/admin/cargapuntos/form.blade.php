@csrf
<div class="main-card mb-3 card">
    <div class="card-body">
        <h3 class="titulo-azul">Cargra Archivo</h3>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="archivo">Archivo</label>
                    <input type="file" name="archivo" id="archivo" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">


                </div>
            </div>
       
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-secondary btn-cancel">Cancelar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div>
</div>