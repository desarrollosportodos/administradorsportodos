@extends("theme.lte.layout")

@section('titulo')
Subcategorías
@endsection

@section('contenido')
<div class="container">
    <h1>Subcategorías</h1>
    <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary mb-3">Crear Subcategoría</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategories as $subcategory)
            <tr>
                <td>{{ $subcategory['name'] }}</td>
                <td>{{ $subcategory['category']['name'] ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.subcategories.edit', $subcategory['id']) }}" class="btn btn-warning">Editar</a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $subcategory['id'] }}">Eliminar</button>

                    <!-- Modal de Confirmación -->
                    <div class="modal fade" id="deleteModal{{ $subcategory['id'] }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar esta subcategoría?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('admin.subcategories.destroy', $subcategory['id']) }}" method="POST">
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
