@extends("theme.lte.layout")
@section('titulo')
Nuevo Cliente
@endsection
@section('contenido')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-id icon-gradient bg-night-fade">
                </i>
            </div>
            <div>Nuevo Cliente
                <div class="page-title-subheading">Aconticunación encontraras el listado de tus Clientes, podras gestionar y visualizar el detalle de cada uno de ellos.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-success" data-original-title="Nuevo Cliente">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>

<form action="{{ route('crearcliente') }}" method="POST">
    @include('admin.clientes.form')
</form>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#registro_tipo").on("change",function(){
                $("#registro_categoria   .tipo").hide();
                var value = $(this).val();
                $("#registro_categoria   .tipo"+value).show();
            });

            $("#registro_tipo").trigger("change");
        });
    </script>
@endsection