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
            <div>Gestion de Espacios y Recursos
                <div class="page-title-subheading">Aconticunación encontraras el listado de los recursos de tu empresa, podras gestionar y visualizar el detalle de cada uno de ellos.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <a data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-success" data-original-title="Nuevo Espacio o Recurso" href="{{ route("gestion-recursos-nuevo") }}">
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
                    <th>No.</th>
                    <th>Clase</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Creditos</th>
                    <th width="100"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $numero => $item)
                <form action="{{ route('tipos-recursos-actualizar',[ 'id' => $item['id'] ]) }}" method="POST">
                    @csrf
                    <tr>
                        <th>
                            {{$numero+1}}
                        </th>
                        <td>
                            <div class="content-form" >
                                @foreach ($tipos as $key => $tipo)
                                    <?php if($item['clase'] == $tipo['id']){ echo $tipo['nombre']; } ?>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <div class="content-form">{{$item['nombre']}}</div>
                        </td>
                        <td>
                            <div class="content-form">{{$item['cantidad']}}</div>
                        </td>
                        <td>
                                <div class="content-form">{{$item['creditos']}}</div>
                            </td>
                        <td class="text-center">
                            <div class="content-form">
                                <a href="{{ route('gestion-recursos-editar',[ 'id' => $item['id'] ]) }}" class="btn btn-sm btn-info "><i class="fas fa-edit"></i></a>
                                <span data-toggle="modal" data-target="#modaleleiminar{{ $item['id']}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></span>
                            </div>
                        </td>
                    </tr>
                </form>
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
                    <form action="{{ route('gestion-recursos-eliminar',[ 'id' => $item['id'] ]) }}"  method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection