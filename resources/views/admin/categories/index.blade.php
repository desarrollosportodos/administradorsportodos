@extends("theme.lte.layout")

@section('titulo')
Categorías
@endsection

@section('contenido')
<div class="container">
    <h1>Categorías</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Crear Categoría</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category['name'] }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category['id']) }}" class="btn btn-warning">Editar</a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $category['id'] }}">Eliminar</button>

                    <!-- Modal de Confirmación -->
                    <div class="modal fade" id="deleteModal{{ $category['id'] }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar esta categoría?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('admin.categories.destroy', $category['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
