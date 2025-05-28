@extends("theme.lte.layout")

@section('titulo')
Productos
@endsection

@section('contenido')
<div class="container">
    <h1>Productos</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Crear Producto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Subcategoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['subcategory']['name'] ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product['id']) }}" class="btn btn-warning">Editar</a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $product['id'] }}">Eliminar</button>

                    <!-- Modal de Confirmación -->
                    <div class="modal fade" id="deleteModal{{ $product['id'] }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar este producto?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('admin.products.destroy', $product['id']) }}" method="POST">
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
