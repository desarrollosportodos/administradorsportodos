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
                <h1 class="titulo-general">Gestion de Iniciativas</h1>

            </div>
            <div class="page-title-actions">
               
            </div>
        </div>
    </div>

    <div class="text-right">
        <a data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow btn btn-success" data-original-title="Nuevo Espacio o Recurso" href="{{ route("iniciativas-nuevo") }}"> <i class="fa fa-plus"></i> </a>
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
                            <th>Categoria</th>
                            <th>Foto</th>
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
                                   {{ $item['name'] }}
                                </td>
                                <td>
                                    {{ $item['iniciativetype']['name'] }}
                                 </td>
                                 <td>
                                    <img src="{{$item['foto']}}" class="thumbnail" alt="">
                                 </td>
                               <td>
                                <a class="btn btn-primary " href="{{ route('iniciativas-editar',[ 'id' => $item['id'] ]) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                               </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection