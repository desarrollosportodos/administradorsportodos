@extends("theme.lte.layout")
@section('titulo')
Iniciativas
@endsection
@section('contenido')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-box1 icon-gradient bg-night-fade">
                    </i>
                </div>
                <h1 class="titulo-general">Gestion de Solicitudes de Iniciativas</h1>

            </div>
            <div class="page-title-actions">
               
            </div>
        </div>
    </div>

    <div id="listado">
        <div class="card">
            <div class="card-body">
                <table id="listtable" class="mb-0 table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Solucion</th>
                            <th>Categoria</th>
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
                                   {{ $item['nombre'] }}
                                </td>
                                <td>
                                    {{ $item['solucion'] }}
                                 </td>
                                 <td>
                                    {{
                                        $item['categoria']; 
                                    }}
                                 </td>
                               <td>
                                <a class="btn btn-primary " href="{{ route('iniciativasolicitud-detalle',[ 'id' => $item['id'] ]) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
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