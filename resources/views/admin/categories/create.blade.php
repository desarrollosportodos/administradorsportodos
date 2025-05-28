@extends("theme.lte.layout")

@section('titulo')
Crear Categoría
@endsection

@section('contenido')
<div class="container">
    <h1>Crear Categoría</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
