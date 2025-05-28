@extends("theme.lte.layout")

@section('titulo')
Crear Producto
@endsection

@section('contenido')
<div class="container">
    <h1>Crear Producto</h1>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" class="form-control" id="sku" name="sku" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="currency_type">Tipo de Moneda</label>
            <input type="text" class="form-control" id="currency_type" name="currency_type" required>
        </div>
        <div class="form-group">
            <label for="token_value">Valor en Tokens</label>
            <input type="number" step="0.01" class="form-control" id="token_value" name="token_value" required>
        </div>
        <div class="form-group">
            <label for="subcategory_id">Subcategoría</label>
            <select class="form-control" id="subcategory_id" name="subcategory_id" required>
                @foreach($subcategories as $subcategory)
                <option value="{{ $subcategory['id'] }}">{{ $subcategory['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="images">Imágenes</label>
            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
