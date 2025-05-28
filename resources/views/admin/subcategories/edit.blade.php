@extends("theme.lte.layout")

@section('titulo')
Editar Subcategoría
@endsection

@section('contenido')
<div class="container">
    <h1>Editar Subcategoría</h1>
    <form action="{{ route('admin.subcategories.update', $subcategory['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $subcategory['name'] }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Categoría</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}" {{ $subcategory['category_id'] == $category['id'] ? 'selected' : '' }}>
                    {{ $category['name'] }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
