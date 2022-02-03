<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/style_login.css') }}">
    <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body>
    <section class="login">
        <div class="login-container">
            <img class="avatar"src="static/img/suizo.png" alt="">
            <form action="/login" method="POST">
                @csrf
                <label>Nombre</label>
                <input type="text" class="login-nombre-usuario" placeholder="Escriba su nombre" name="usuario">

                <label>Contraseña</label>
                <input type="password" class="login-password" placeholder="Escriba su contraseña" name="contrasena">
                
                <button type="submit">Iniciar sesión</button>
            </form>
        </div>
    </section>
</body>
@if (Session::has('msg') == ' falta ')

    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Error al Iniciar sesion',
            showConfirmButton: false,
            timer: 1500

        })
    </script>
@endif
</html>