<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('titulo','Gestor de Red') | Sportodos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" type="text/css" href="/assets/DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset("/assets/iconos/css/style.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/main.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/fileinput/css/fileinput.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/galery/baguetteBox.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/galery/fluid-gallery.css")}}">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
    @yield('styles')

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include("theme/lte/header");
        <div class="app-main">
            @include("theme/lte/aside")
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('contenido')
                </div>
            </div>
        </div>
        @include("theme/lte/footer")
        @yield('adicionales')
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>
        <script type="text/javascript" src="/assets/DataTables/datatables.min.js"></script>
        <script src="/assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <script type="text/javascript" src="{{ asset("assets/fileinput/js/fileinput.js") }}"></script>
        <script type="text/javascript" src="{{ asset("assets/fileinput/js/locales/es.js") }}"></script>
        <script type="text/javascript" src="{{ asset("assets/galery/baguetteBox.min.js") }}"></script>
        <script type="text/javascript" src="{{ asset("assets/admin/scripts/main.js") }}"></script>
        @yield("scripts")
        
</body>
</html>