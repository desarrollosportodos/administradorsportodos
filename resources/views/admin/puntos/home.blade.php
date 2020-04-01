@extends("theme.lte.layout")
@section('titulo')
Puntos de encuentro
@endsection
@section('contenido')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-box1 icon-gradient bg-night-fade">
                    </i>
                </div>
                <div>Gestion de Puntos de encuentro
                    <div class="page-title-subheading">Aconticunación encontraras el listado de los puntos deportivos, podras gestionar y visualizar el detalle de cada uno de ellos.
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                
            </div>
        </div>
    </div>
    <div class="text-right">
        <a data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow btn btn-success" data-original-title="Nuevo Espacio o Recurso" href="{{ route("puntos-nuevo") }}"> <i class="fa fa-plus"></i> </a>
        <button class="btn btn-info" id="tipo_listado"><i class="fas fa-list-ul"></i></button>
        <button class="btn btn-info" id="tipo_cajas"><i class="fas fa-th"></i></button>
    </div>
    <br>
    <div id="listado"></div>
@endsection

@section('scripts')
<script>
    $("#tipo_listado").on("click",function(){
        $(this).attr("disabled", true);
        $("#tipo_cajas").removeAttr("disabled");;
        $("#listado").stop().load("/administrador/puntos/listado");
    });
    $("#tipo_cajas").on("click",function(){
        $(this).attr("disabled", true);
        $("#tipo_listado").removeAttr("disabled");;
        $("#listado").stop().load("/administrador/puntos/listadocajas");
    });
    $("#tipo_cajas").trigger("click");
</script>
@endsection