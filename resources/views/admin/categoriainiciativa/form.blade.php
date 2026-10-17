@csrf
<div class="main-card mb-3 card">
    <div class="card-body">
        <h3 class="titulo-azul">Nueva Categoria</h3>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción corta</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="2" maxlength="160" placeholder="Describe brevemente el propósito de esta categoría"></textarea>
            <small class="form-text text-muted">Aparecerá debajo del nombre en las tarjetas y en el detalle de la categoría.</small>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-secondary btn-cancel">Cancelar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div>
</div>
