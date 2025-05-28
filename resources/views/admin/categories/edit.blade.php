@extends("theme.lte.layout")

@section('titulo')
Editar Categoría
@endsection

@section('contenido')
<div class="container">
    <h1>Editar Categoría</h1>
    <form action="{{ route('admin.categories.update', $category['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category['name'] }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection