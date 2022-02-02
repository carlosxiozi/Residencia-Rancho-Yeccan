<div class="content_bread">
    <ul>
        <li class="item_selected">Eventos > </li>
        <li class="item_selected">Editar Evento</li>
    </ul>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuario</title>
</head>

<body>
    <center>
        <section class="trabajador-create">
            <div class="container-fluid mt-5 row mx-auto">

                <form style="background: white !important" class="row col-xs col-sm col-md col-xl-5 shadow p-2 mx-auto"
                    action="/usuarios/{{ $usuario->id }}" method="POST" class="trabajador-form">
                    @csrf
                    @method('PUT')
                    <a href="/usuarios" class="btn btn-info"><span class="fas fa-long-arrow-alt-left"></span>
                        Regresar</a>
                    <div class="row p-2 mx-auto">

                        <div class="input-group mb-3">
                            <span class="input-group-text">Nombre del usuario </span>
                            <input class="form-control" type="text" name="nombre"  value="{{ $usuario->nombre }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Apellido </span>
                            <input type="text" name="apellidos" value="{{ $usuario->apellidos }}">
                        </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Contraseña </span>
                                <input type="password" name="contrasena">

                            </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Confirmar Contraseña </span>
                                    <input type="password" name="contrasena_conf">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Telefono </span>
                                    <input type="text" name="telefono" value="{{ $usuario->telefono }}">
                                </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rol </span>
                                        <select name="rol" id="">
                                            <option value="{{ $usuario->rol }}">{{ $usuario->rol }}</option>
                                            <option value="Veterinario">Veterinario</option>
                                            <option value="Trabajador">Trabajador</option>
                                            <br>
                                        </select>
                                    </div>
                    
                    
                        <br><button class="btn btn-primary" type="submit">Actualizar</button>
                        
                    </div>
                </form>
            </div>

        </section>
    </center>
</body>

</html>
