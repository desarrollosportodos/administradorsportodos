@php
    $item = $item ?: [];
    $selected = $item['modules'] ?? [];
    $modules = [
        'home' => ['Inicio', 'pe-7s-home'], 'challenges' => ['Juega', 'pe-7s-medal'], 'tournaments' => ['Torneos', 'pe-7s-diamond'],
        'penalty-championship' => ['Torneo de penales', 'pe-7s-football'], 'king-of-court' => ['Rey de la cancha', 'pe-7s-cup'],
        'initiatives' => ['Iniciativas', 'pe-7s-like'], 'meetpoints' => ['Espacios', 'pe-7s-map-marker'], 'teams' => ['Equipos', 'pe-7s-users'],
        'people' => ['Personas', 'pe-7s-users'], 'market' => ['Tienda', 'pe-7s-cart'], 'share' => ['Comparte', 'pe-7s-comment'],
        'participate' => ['Participa', 'pe-7s-joy'], 'memberships' => ['Membresías', 'pe-7s-wallet'], 'services' => ['Servicios', 'pe-7s-portfolio'],
    ];
    $formId = 'landing-'.($item['id'] ?? 'new');
@endphp
<div class="landing-section-title">Identidad</div>
<div class="row">
    <div class="col-md-4 form-group"><label class="font-weight-bold">Nombre</label><input required name="name" class="form-control" value="{{ $item['name'] ?? '' }}" placeholder="Comunidad 360"></div>
    <div class="col-md-4 form-group"><label class="font-weight-bold">Ruta pública</label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">/</span></div><input required name="slug" pattern="[A-Za-z0-9_-]+" class="form-control" placeholder="360" value="{{ $item['slug'] ?? '' }}"></div><small class="text-muted">Solo letras, números, guion y guion bajo.</small></div>
    <div class="col-md-4 form-group"><label class="font-weight-bold">Logo</label><label for="{{ $formId }}-logo" class="landing-logo-drop d-flex align-items-center mb-0"><span class="landing-logo-empty mr-3 preview-empty"><i class="pe-7s-camera"></i></span><img class="landing-logo-preview mr-3 d-none preview-image" alt="Vista previa"><span><strong class="d-block">Cargar imagen</strong><small class="text-muted">PNG, JPG o WEBP · máx. 4 MB</small></span><input id="{{ $formId }}-logo" type="file" name="logo" accept="image/png,image/jpeg,image/webp" class="d-none landing-logo-input"></label></div>
</div>
<div class="landing-section-title">Apariencia</div>
<div class="row">
    <div class="col-md-3 form-group"><label class="font-weight-bold">Color principal</label><div class="d-flex align-items-center"><input type="color" name="primary_color" class="mr-2" value="{{ $item['primary_color'] ?? '#1f3c88' }}" style="width:48px;height:38px;padding:2px"><code>{{ $item['primary_color'] ?? '#1f3c88' }}</code></div></div>
    <div class="col-md-3 form-group"><label class="font-weight-bold">Color del header</label><div class="d-flex align-items-center"><input type="color" name="header_color" class="mr-2" value="{{ $item['header_color'] ?? '#10172f' }}" style="width:48px;height:38px;padding:2px"><code>{{ $item['header_color'] ?? '#10172f' }}</code></div><small class="text-muted">Se usa en la botonera principal.</small></div>
    <div class="col-md-3 form-group"><label class="font-weight-bold">Color de fondo</label><div class="d-flex align-items-center"><input type="color" name="secondary_color" class="mr-2" value="{{ $item['secondary_color'] ?? '#f5f7fb' }}" style="width:48px;height:38px;padding:2px"><code>{{ $item['secondary_color'] ?? '#f5f7fb' }}</code></div></div>
    <div class="col-md-3 form-group"><label class="font-weight-bold">Tema de la landing</label><select name="theme_mode" class="form-control" required><option value="light" {{ ($item['theme_mode'] ?? 'dark') === 'light' ? 'selected' : '' }}>Claro</option><option value="dark" {{ ($item['theme_mode'] ?? 'dark') === 'dark' ? 'selected' : '' }}>Oscuro</option></select><small class="text-muted">El usuario no podrá cambiarlo.</small></div>
    <div class="col-md-3 form-group"><label class="font-weight-bold d-block">Estado</label><label><input type="hidden" name="active" value="0"><input type="checkbox" name="active" value="1" {{ ($item['active'] ?? true) ? 'checked' : '' }}> Publicada y visible para los usuarios</label></div>
</div>
<div class="landing-section-title">Experiencia de acceso</div>
<div class="row">
    <div class="col-md-6 form-group"><label class="font-weight-bold">Título del login</label><input name="auth_title" maxlength="120" class="form-control" value="{{ $item['auth_title'] ?? '' }}" placeholder="Bienvenido a la comunidad 360"></div>
    <div class="col-md-6 form-group"><label class="font-weight-bold">Subtítulo</label><input name="auth_subtitle" maxlength="180" class="form-control" value="{{ $item['auth_subtitle'] ?? '' }}" placeholder="Conecta, juega y disfruta"></div>
    <div class="col-md-8 form-group"><label class="font-weight-bold">Información de bienvenida</label><textarea name="auth_description" maxlength="500" rows="3" class="form-control" placeholder="Encuentra torneos, espacios y personas de tu comunidad.">{{ $item['auth_description'] ?? '' }}</textarea></div>
    <div class="col-md-4 form-group"><label class="font-weight-bold">Fondo del login</label><label for="{{ $formId }}-auth-background" class="landing-logo-drop d-flex align-items-center mb-0"><span class="landing-logo-empty mr-3 auth-preview-empty"><i class="pe-7s-photo"></i></span><img class="landing-logo-preview mr-3 d-none auth-preview-image" alt="Vista previa del fondo"><span><strong class="d-block">Cargar fondo</strong><small class="text-muted">Imagen · máx. 8 MB</small></span><input id="{{ $formId }}-auth-background" type="file" name="auth_background" accept="image/png,image/jpeg,image/webp" class="d-none landing-auth-background-input"></label></div>
</div>
<div class="landing-section-title">Módulos disponibles</div>
<div>
    @foreach($modules as $key => $module)
    <label class="landing-module"><input type="checkbox" name="modules[]" value="{{ $key }}" {{ in_array($key, $selected) ? 'checked' : '' }}><i class="{{ $module[1] }}"></i><span>{{ $module[0] }}</span></label>
    @endforeach
</div>
<script>
document.querySelectorAll('.landing-logo-input').forEach(function(input){input.addEventListener('change',function(){var label=input.closest('label');var image=label.querySelector('.preview-image');var empty=label.querySelector('.preview-empty');if(input.files&&input.files[0]){image.src=URL.createObjectURL(input.files[0]);image.classList.remove('d-none');empty.classList.add('d-none');}});});
document.querySelectorAll('.landing-auth-background-input').forEach(function(input){input.addEventListener('change',function(){var label=input.closest('label');var image=label.querySelector('.auth-preview-image');var empty=label.querySelector('.auth-preview-empty');if(input.files&&input.files[0]){image.src=URL.createObjectURL(input.files[0]);image.classList.remove('d-none');empty.classList.add('d-none');}});});
</script>
