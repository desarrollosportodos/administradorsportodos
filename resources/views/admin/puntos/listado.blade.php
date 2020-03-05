<div class="card">
    <div class="card-body">
        <table id="listtable" class="mb-0 table table-bordered">
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
                                <a href="{{ route('puntos-editar',[ 'id' => $item['id'] ]) }}" class="btn btn-sm btn-info "><i class="fas fa-edit"></i></a>
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