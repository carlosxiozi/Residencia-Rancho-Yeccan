<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        src = "{{ asset('static/css/sweetalert2.all.min.js') }}" >
    </script>
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear</title>
</head>
<div class="content_bread">
    <ul>
        <li class="item_selected">Usuarios > </li>
        <li class="item_selected">Crear nuevo usuario</li>
    </ul>
</div>

<body>
    <section class="trabajador-create">

        <div class="container-fluid mt-5 row mx-auto">
            <form style="background: white !important" class="row col-xs col-sm col-md col-xl-5 shadow p-2 mx-auto"
                action="/usuarios" method="POST" class="trabajador-form">
                @csrf
                <a href="/usuarios" class="btn btn-info"><span class="fas fa-long-arrow-alt-left"></span> Regresar</a>
                <div class="row p-2 mx-auto">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Nombre: </span>
                        <input class="form-control" type="text" name="nombre">
                  
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Apellidos: </span>
                        <input class="form-control" type="text" name="apellidos">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Contraseña: </span>
                        <input class="form-control" type="password" name="contrasena">
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text">Confirmar Contraseña: </span>
                        <input class="form-control" type="password" name="contrasena_conf">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Numero de telefono: </span>
                        <input class="form-control" type="text" name="telefono">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rol: </span>
                                                            <select  name="rol" id="">
                                                                <option selected>Seleccione un rol</option>
                                                                <option value="Veterinario">Veterinario</option>
                                                                <option value="Trabajador">Trabajador</option>
                                                            </select> <br>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Agregar</button>


            </form>

        </div>
    </section>

    @if (Session::has('message') == ' ok ')

        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Se agrego correctamente',
                showConfirmButton: false,
                timer: 1500

            })
        </script>
    @elseif(Session::has('msg') == ' falta ')

        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'Fecha atrasada',
                showConfirmButton: false,
                timer: 1500

            })
        </script>
    @endif
</body>


</html>
