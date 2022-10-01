@extends("theme.lte.layout")
@section('titulo')
Usuarios
@endsection
@section('contenido')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-box1 icon-gradient bg-night-fade">
                    </i>
                </div>
                <h1 class="titulo-general">Usuarios</h1>

            </div>
            <div class="page-title-actions">
               
            </div>
        </div>
    </div>

    <div class="text-right">
        <a data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow btn btn-success" data-original-title="Nuevo Usuario" href="{{ route("usuarios-nuevo") }}"> <i class="fa fa-plus"></i> </a>
    </div>
    <br>
    <div id="listado">
        <div class="card">
            <div class="card-body">
                <table id="listtable" class="mb-0 table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Nivel</th>
                            <th width="100"></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($listado as $numero => $item)
                            @csrf
                            <tr>
                                <td>
                                    {{$numero+1}}
                                </td>
                                <td>
                                   {{ $item['user_names']." ".$item['user_lastnames'] }}
                                </td>
                                <td>
                                    {{ $item['user_email'] }}
                                </td>
                                <td>
                                    <?php
                                        $nivel = 2;
                                        if($item['user_level'] > 0){
                                            $nivel = $item['user_level'];
                                        }
                                    ?>
                                    {{ $niveles[$nivel] }}
                                </td>
                               <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('usuarios-editar',[ 'id' => $item['user_id'] ]) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                <span data-toggle="modal" data-target="#modaleleiminar{{ $item['user_id']}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></span>   
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script>
             $('#listtable').DataTable();
        </script>
    </div>
@endsection

@section('scripts')

@endsection

@section('adicionales')
    @foreach ($listado as $item)
        <div class="modal fade" id="modaleleiminar{{ $item['user_id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Esta seguro de eliminar el usuario {{ $item['user_names']." ".$item['user_lastnames'] }} de la lista ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('usuarios-eliminar',[ 'id' => $item['user_id'] ]) }}"  method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection