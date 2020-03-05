
<div class="modal-header">
    <h5 class="modal-title" >{{ strtoupper($data['espacio']['nombre']) }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{ $data['espacio']['foto']  }}"  class="foto-detalle-espacio" />
        </div>
        <div class="col-sm-6">
            <div class="descripcion">
            <div>{!! $data['espacio']['descripcion'] !!}</div>
            <div><strong>Deportes</strong></div>
            <div class="deportes">
                @foreach ($data['deportes'] as $deporte)
                    <i class="icon {{$deporte['icono']}}"></i>
                @endforeach
            </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div id="mappopup" class="form-map">

            </div>
        </div>
    </div>
</div>
<script>
    var mapp = new GMaps({
        div: '#mappopup',
        lat: "{{ $data['espacio']['latitud'] }}",
        lng: "{{ $data['espacio']['longitud'] }}",
    });
    mapp.addMarker({
        lat: "{{ $data['espacio']['latitud'] }}",
        lng: "{{ $data['espacio']['longitud'] }}",
    });  
</script>