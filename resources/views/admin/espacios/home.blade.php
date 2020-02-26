@extends("theme.lte.layout")
@section('titulo')
Recursos o Espacios
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-box1 icon-gradient bg-night-fade">
                </i>
            </div>
            <div>Gestion de Espacios Deportivos
                <div class="page-title-subheading">Aconticunación encontraras el listado de los espacios deportivos, podras gestionar y visualizar el detalle de cada uno de ellos.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <a data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-success" data-original-title="Nuevo Espacio o Recurso" href="{{ route("espacios-nuevo") }}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="mb-0 table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>

                    <th width="100"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $numero => $item)
                    @csrf
                    <tr>
                        <th>
                            {{$numero+1}}
                        </th>
                        <td>
                           {{ $item['nombre'] }}
                        </td>
                
                        <td class="text-center">
                            <div class="content-form">
                                <a href="{{ route('espacios-editar',[ 'id' => $item['id'] ]) }}" class="btn btn-sm btn-info "><i class="fas fa-edit"></i></a>
                                <span data-toggle="modal" data-target="#modaleleiminar{{ $item['id']}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></span>
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
                    ¿Esta seguro de eliminar {{ $item['nombre']}} de la lista ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('espacios-eliminar',[ 'id' => $item['id'] ]) }}"  method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection