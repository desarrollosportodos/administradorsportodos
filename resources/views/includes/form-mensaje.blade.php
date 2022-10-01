@if (session("mensaje"))
    <div class="alert alert-success alert-dismissible" data-auto-dismmiss='2000'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>Mensaje Sistema</h4>
        <ul>
        <li>{{ session("mensaje") }}</li>
        </ul>
    </div>
@endif