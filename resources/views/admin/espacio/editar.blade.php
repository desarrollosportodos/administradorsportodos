<div class="modal-header">
    <h5 class="modal-title" >Editar Espacio</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('espacio-actualizar',[ 'id' => $data['espacio']['id'] ]) }}" method="POST" enctype="multipart/form-data">
        @include('admin.espacio.form')
        <div class="text-right">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>