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
    $currentLogo = $item['logo_url'] ?? null;
    $currentAuthBackground = $item['auth_background_url'] ?? null;
@endphp
<style>
    .landing-form-card{border:0;border-radius:22px;box-shadow:0 12px 32px rgba(33,45,80,.08);overflow:hidden;background:#fff}
    .landing-form-card .card-body{padding:30px}
    .landing-section-title{display:flex;align-items:center;gap:10px;font-size:12px;text-transform:uppercase;letter-spacing:.14em;color:#244b91;font-weight:800;margin:28px 0 16px}
    .landing-section-title:before{content:"";display:block;width:5px;height:22px;border-radius:8px;background:linear-gradient(#09c978,#ff762b)}
    .landing-section-title:first-child{margin-top:0}
    .landing-form-card .form-group{margin-bottom:20px}.landing-form-card label.font-weight-bold{display:block;margin-bottom:8px;color:#253654;font-size:12px;letter-spacing:.01em}.landing-form-card .form-control{height:43px;border:1px solid #dce4ef;border-radius:10px;box-shadow:none;color:#1a2a49}.landing-form-card textarea.form-control{height:auto;min-height:90px;resize:vertical}.landing-form-card .form-control:focus{border-color:#5b82c4;box-shadow:0 0 0 3px rgba(91,130,196,.12)}.landing-form-card .input-group-text{border:1px solid #dce4ef;border-right:0;border-radius:10px 0 0 10px;background:#f5f8fc;color:#70809b}.landing-form-card .input-group .form-control{border-radius:0 10px 10px 0}.landing-form-card small.text-muted{display:block;margin-top:7px;color:#8b97aa!important;font-size:11px}
    .landing-logo-drop{border:1px dashed #cdd8e8;border-radius:14px;padding:12px;background:#f9fbfd;cursor:pointer;transition:.2s;min-height:72px}.landing-logo-drop:hover{border-color:#4b6cb7;background:#f3f6ff;transform:translateY(-1px)}
    .landing-logo-empty{width:52px;height:52px;border-radius:12px;background:#eef2f8;color:#8490a8;display:flex;align-items:center;justify-content:center;font-size:24px;flex:0 0 auto}
    .landing-logo-preview{width:52px;height:52px;object-fit:contain;border-radius:12px;background:#fff;border:1px solid #e6eaf2;padding:5px;flex:0 0 auto}
    .landing-module{display:inline-flex;align-items:center;gap:8px;border:1px solid #e1e6ef;border-radius:11px;padding:10px 13px;margin:0 8px 8px 0;background:#fff;cursor:pointer;font-size:13px;color:#536078;transition:.2s}
    .landing-module:has(input:checked){background:#edf3ff;border-color:#4b6cb7;color:#24458f;box-shadow:0 4px 12px rgba(75,108,183,.15)}
    .landing-module input{accent-color:#4b6cb7}
    .landing-rich-editor{overflow:hidden;border:1px solid #dce4ef;border-radius:12px;background:#fff}.landing-rich-editor__toolbar{display:flex;flex-wrap:wrap;gap:5px;padding:8px;border-bottom:1px solid #e7ecf3;background:#f7f9fc}.landing-rich-editor__toolbar button{width:30px;height:28px;border:1px solid #dce4ef;border-radius:7px;background:#fff;color:#52627e;font-weight:700;cursor:pointer}.landing-rich-editor__toolbar button:hover{border-color:#4b6cb7;color:#244b91;background:#f0f5ff}.landing-rich-editor__body{min-height:112px;padding:12px 14px;outline:0;color:#1a2a49;font-size:13px;line-height:1.55}.landing-rich-editor__body:empty:before{content:attr(data-placeholder);color:#8b97aa}.landing-rich-editor:focus-within{border-color:#5b82c4;box-shadow:0 0 0 3px rgba(91,130,196,.12)}
</style>
<div class="landing-section-title">Identidad</div>
<div class="row">
    <div class="col-md-4 form-group"><label class="font-weight-bold">Nombre</label><input required name="name" class="form-control" value="{{ $item['name'] ?? '' }}" placeholder="Comunidad 360"></div>
    <div class="col-md-4 form-group"><label class="font-weight-bold">Ruta pública</label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">/</span></div><input required name="slug" pattern="[A-Za-z0-9_-]+" class="form-control" placeholder="360" value="{{ $item['slug'] ?? '' }}"></div><small class="text-muted">Solo letras, números, guion y guion bajo.</small></div>
    <div class="col-md-4 form-group"><label class="font-weight-bold">Logo</label><label for="{{ $formId }}-logo" class="landing-logo-drop d-flex align-items-center mb-0"><span class="landing-logo-empty mr-3 preview-empty {{ $currentLogo ? 'd-none' : '' }}"><i class="pe-7s-camera"></i></span><img src="{{ $currentLogo ?: '' }}" class="landing-logo-preview mr-3 preview-image {{ $currentLogo ? '' : 'd-none' }}" alt="Logo actual"><span><strong class="d-block">{{ $currentLogo ? 'Reemplazar imagen' : 'Cargar imagen' }}</strong><small class="text-muted">PNG, JPG o WEBP · máx. 4 MB</small></span><input id="{{ $formId }}-logo" type="file" name="logo" accept="image/png,image/jpeg,image/webp" class="d-none landing-logo-input"></label></div>
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
    <div class="col-md-8 form-group"><label class="font-weight-bold">Información de bienvenida</label><div class="landing-rich-editor"><div class="landing-rich-editor__toolbar" role="toolbar" aria-label="Formato de texto"><button type="button" data-command="bold" title="Negrita"><strong>B</strong></button><button type="button" data-command="italic" title="Cursiva"><em>I</em></button><button type="button" data-command="insertUnorderedList" title="Lista">•</button><button type="button" data-command="createLink" title="Enlace">↗</button></div><div class="landing-rich-editor__body" contenteditable="true" data-placeholder="Encuentra torneos, espacios y personas de tu comunidad.">{!! strip_tags($item['auth_description'] ?? '', '<p><br><strong><b><em><i><ul><ol><li><a>') !!}</div><input type="hidden" name="auth_description" value="{{ $item['auth_description'] ?? '' }}"></div><small class="text-muted">Puedes usar negrita, cursiva, listas y enlaces.</small></div>
    <div class="col-md-4 form-group"><label class="font-weight-bold">Fondo del login</label><label for="{{ $formId }}-auth-background" class="landing-logo-drop d-flex align-items-center mb-0"><span class="landing-logo-empty mr-3 auth-preview-empty {{ $currentAuthBackground ? 'd-none' : '' }}"><i class="pe-7s-photo"></i></span><img src="{{ $currentAuthBackground ?: '' }}" class="landing-logo-preview mr-3 auth-preview-image {{ $currentAuthBackground ? '' : 'd-none' }}" alt="Fondo actual"><span><strong class="d-block">{{ $currentAuthBackground ? 'Reemplazar fondo' : 'Cargar fondo' }}</strong><small class="text-muted">Imagen · máx. 8 MB</small></span><input id="{{ $formId }}-auth-background" type="file" name="auth_background" accept="image/png,image/jpeg,image/webp" class="d-none landing-auth-background-input"></label></div>
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
document.querySelectorAll('.landing-rich-editor').forEach(function(editor){var body=editor.querySelector('.landing-rich-editor__body');var output=editor.querySelector('input[name="auth_description"]');editor.querySelectorAll('[data-command]').forEach(function(button){button.addEventListener('click',function(){body.focus();var command=button.getAttribute('data-command');if(command==='createLink'){var url=window.prompt('URL del enlace');if(url) document.execCommand(command,false,url);}else{document.execCommand(command,false,null);}output.value=body.innerHTML;});});var form=editor.closest('form');if(form) form.addEventListener('submit',function(){output.value=body.innerHTML;});});
</script>
