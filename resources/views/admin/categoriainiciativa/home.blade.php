@extends("theme.lte.layout")
@section('titulo')
    Categorias de Iniciativas
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-box1 icon-gradient bg-night-fade">
                </i>
            </div>
            <div> Categorias de Iniciativas
                <div class="page-title-subheading">
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-success btn-new-internal" data-original-title="Nueva Barrera" >
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>

<div class="new-internal" >
    <form action="{{ route('categoriainiciativas-crear') }}" method="POST"  enctype="multipart/form-data">
        @include('admin.categoriainiciativa.form')
    </form>
</div>
@if(session('mensaje')) <div class="alert alert-success">{{ session('mensaje') }}</div> @endif
@if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

{{-- Los formularios no deben estar dentro de la tabla: el navegador puede moverlos
     y dejar el botón de guardar sin una acción asociada. --}}
<div class="d-none">
    @foreach ($listado as $item)
        <form id="actualizar-categoria-{{ $item['id'] }}" action="{{ route('categoriainiciativas-actualizar',[ 'id' => $item['id'] ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
        </form>
    @endforeach
</div>
<div class="card">
    <div class="card-body">
        <table  id="listtable" class="mb-0 table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Descripción corta</th>
                    <td>Imagen</td>
                    <th width="100"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $numero => $item)
                    <tr>
                        <th>
                            {{$numero+1}}
                        </th>
                        <td>
                            <div class="content-form">{{$item['name']}}</div>
                            <input type="text" name="nombre" value="{{$item['name']}}" class="form-control form-control-sm edit-form" form="actualizar-categoria-{{ $item['id'] }}">
                        </td>
                        <td>
                            <div class="content-form">{{ $item['desc'] ?? 'Sin descripción' }}</div>
                            <textarea name="descripcion" rows="2" maxlength="160" class="form-control form-control-sm edit-form" form="actualizar-categoria-{{ $item['id'] }}">{{ $item['desc'] ?? '' }}</textarea>
                        </td>
                        <td>
                            <div class="content-form">
                                <img src="{{$item['pic']}}" class="thumbnail" alt="">
                            </div>
                            <input type="file" name="imagen"  class="form-control form-control-sm edit-form" form="actualizar-categoria-{{ $item['id'] }}">
                        </td>
                        <td class="text-center">
                            <div class="content-form">
                                <span class="btn btn-sm btn-info edit-element"><i class="fas fa-edit"></i></span>
                                <span data-toggle="modal" data-target="#modaleleiminar{{ $item['id']}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></span>
                            </div>
                            <div class="edit-form">
                                <button type="submit" form="actualizar-categoria-{{ $item['id'] }}" class="btn btn-sm btn-success"><i class="fas fa-save"></i></button>
                                <span class="btn btn-sm btn-danger cancel-edit-element"><i class="fas fa-ban"></i></span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>

@endsection

@section('adicionales')
    @foreach ($listado as $item)
        <div class="modal fade" id="modaleleiminar{{ $item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Tipo de Recurso o Espacio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Esta seguro de eliminar {{ $item['name']}} de la lista ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('categoriainiciativas-eliminar',[ 'id' => $item['id'] ]) }}"  method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
