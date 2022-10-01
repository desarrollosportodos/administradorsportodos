@extends("theme.lte.layout")
@section('titulo')
Deportes
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-box1 icon-gradient bg-night-fade">
                </i>
            </div>
            <div>Deportes
                <div class="page-title-subheading">Aconticunación encontraras el listado de los Deportes, podras gestionar y visualizar cada uno de ellos.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-success btn-new-internal" data-original-title="Nuevo Espacio o Recurso" >
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>

<div class="new-internal" >
    <form action="{{ route('deportes-crear') }}" method="POST">
        @include('admin.deportes.form')
    </form>
</div>
<div class="card">
    <div class="card-body">
        <?php
            $equipos = [];
            $equipos[0]="Si";
            $equipos[1]="No";
            $activo = [];
            $activo[1]="Si";
            $activo[0]="No";
        ?>
        <table class="mb-0 table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Icono</th>
                    <th>Equipos</th>
                    <th>Minimo</th>
                    <th>Maximo</th>
                    <th>Activo</th>
                    <th width="100"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $numero => $item)
                <form action="{{ route('deportes-actualizar',[ 'id' => $item['id'] ]) }}" method="POST">
                    @csrf
                    <tr>
                        <th>
                            {{$numero+1}}
                        </th>
                        <td>
                            <div class="content-form"> <i class="icon {{$item['icono']}}"></i></div>
                            <input type="text" name="icono" value="{{$item['icono']}}" class="form-control form-control-sm edit-form">
                        </td>
                        <td>
                            <div class="content-form">{{$item['nombre']}}</div>
                            <input type="text" name="nombre" value="{{$item['nombre']}}" class="form-control form-control-sm edit-form">
                        </td>
                        
                        <td>
                            <div class="content-form">{{ $equipos[(int)$item['tipo']]}}</div>
                            <select name="tipo" class="form-control form-control-sm edit-form">
                                <option value="0">Si</option>
                                <option value="1" <?php if($item['tipo'] == 1){ echo "selected"; } ?>>No</option>
                            </select>
                        </td>
                        <td>
                            <div class="content-form">{{$item['minimo']}}</div>
                            <input type="text" name="minimo" value="{{$item['minimo']}}" class="form-control form-control-sm edit-form">
                        </td>
                        <td>
                            <div class="content-form">{{$item['maximo']}}</div>
                            <input type="text" name="maximo" value="{{$item['maximo']}}" class="form-control form-control-sm edit-form">
                        </td>
                        <td>
                            <div class="content-form">{{ $activo[(int)$item['activo']]}}</div>
                            <select name="activo" class="form-control form-control-sm edit-form">
                                <option value="0">No</option>
                                <option value="1" <?php if($item['activo'] == 1){ echo "selected"; } ?>>Si</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <div class="content-form">
                                <span class="btn btn-sm btn-info edit-element"><i class="fas fa-edit"></i></span>
                                <span data-toggle="modal" data-target="#modaleleiminar{{ $item['id']}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></span>
                            </div>
                            <div class="edit-form">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i></button>
                                <span class="btn btn-sm btn-danger cancel-edit-element"><i class="fas fa-ban"></i></span>
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
                        <form action="{{ route('deportes-eliminar',[ 'id' => $item['id'] ]) }}"  method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection