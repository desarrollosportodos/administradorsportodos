<div class="card">
    <div class="card-body">
        <table id="listtable" class="mb-0 table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Deportes</th>
                    <th>Servicios</th>

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
                        <td>
                            @foreach ($item['deportes'] as $deporte)
                                <i class="icon {{$deporte['icono']}}"></i>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($item['servicios'] as $servicio)
                                <i class="icon {{$servicio['icono']}}"></i>
                            @endforeach
                        </td>
                
                        <td class="text-center">
                            <div class="content-form">
                                <a href="{{ route('puntos-detalle',[ 'id' => $item['id'] ]) }}" class="btn btn-sm btn-info "><i class="fas fa-eye"></i></a>
                            </div>
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