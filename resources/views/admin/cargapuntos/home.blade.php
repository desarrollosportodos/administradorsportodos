@extends("theme.lte.layout")
@section('titulo')
Carga puntos
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-box1 icon-gradient bg-night-fade">
                </i>
            </div>
            <div> Carga puntos
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
    <form action="{{ route('cargapuntos-crear') }}" method="POST"  enctype="multipart/form-data">
        @include('admin.cargapuntos.form')
    </form>
</div>
<div class="card">
    <div class="card-body">
        <table class="mb-0 table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Archivo</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $numero => $item)
                    <tr>
                        <th>
                            {{$numero+1}}
                        </th>
                        <td>
                            <div class="content-form">{{ $item['archivo']}}</div>
                        </td>
                        <td>
                            <div class="content-form">
                                @if ($item['estado'] != 0)
                                    Cargado
                                @else
                                    Procesando
                                @endif
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
   
@endsection