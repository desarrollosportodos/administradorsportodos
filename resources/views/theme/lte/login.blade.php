<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login | Togroow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/main.css")}}">
    @yield('styles')
    <body class="login-fondo">
        <div class="box-login">
            <img src="{{ asset("assets/admin/images/logogrande.png") }}" alt="">
            @if (session("mensaje"))
                <div class="alert alert-danger " >
                    {{ session("mensaje") }}
                </div>
            @endif
            <form action="/administrador/login2" method="post">
                @csrf
                <div class="form-group">
                    <i class="fa fa-user"></i>
                    <input type="text" name="email" class="form-control usuario" placeholder="Correo">
                </div>
                <div class="form-group">
                    <i class="fa fa-key"></i>
                    <input type="password" name="password" class="form-control contraseña" placeholder="Contraseña">
                </div>
                <div class="form-group text-right">
                    <button class="btn">Entrar</button>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="{{ asset("assets/admin/scripts/main.js") }}"></script>
        @yield("scripts")
    </body>
</html>