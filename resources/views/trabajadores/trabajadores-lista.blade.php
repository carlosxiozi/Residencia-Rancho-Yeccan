<!DOCTYPE html>
<html lang="en">

<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('static/css/style_events.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('static/css/sweetalert2.all.min.js') }}"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trabajadores</title>
</head>

<body class="cuerpo">

    <nav class="navbar navbar-light " style="background: #E0EAFC;
    background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);
    background: linear-gradient(to right, #CFDEF3, #E0EAFC);">
        <div class="container-fluid badge  text-wrap ">
            <a class="navbar-brand  fs-1 mx-auto" href="/">
                <img src="/static/img/cow.png" alt="" width="80" height="60" class="d-inline-block align-text-top">
                Rancho Yeccan
            </a>
        </div>
    </nav>

    <div style="width: max-content;
        margin: auto;">
        <a class="btn btn-dark" href="/"><span class="fas fa-home"></span>Inicio</a>


        <a class="btn btn-secondary" href="/usuarios/create"><span class="fas fa-plus"></span>Añadir nuevo usuario</a>
    </div>
    <div class="container-fluid m-0 p-0 table-responsive">
        <table class="table table-sm table-striped table-hover caption-top">
            <caption class="m-1">
                Listado de usuarios
            </caption>


            <thead class="table-dark">
                <th>Nombre</th>
                <th>Rol</th>
                <th>Acciones</th>
            </thead>
            @forelse($trabajadores as $trabajo)
                <tr>

                    <td style="text-align: initial;" class="nombre">
                        <h3>{{ $trabajo->nombre }}</h3>
                    </td>

                    <td style="text-align: initial;" class="nombre">
                        <h3>{{ $trabajo->rol }}</h3>
                    </td>
                    <td >
                        <div class="d-flex justify-center align-middle ">
                            <a class="btn btn-primary m-1" href="/usuarios/{{ $trabajo->id }}/edit">Editar</a>
                            <a class="btn btn-info m-1" href="/usuarios/{{ $trabajo->id }}">Mostrar</a>
                            <form action="/usuarios/{{ $trabajo->id }}" class="formulario" method="post"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">sin registros</td>
                </tr>
            @endforelse
        </table>
    </div>
</body>

<script>
    eliminar = document.getElementsByClassName('formulario');
    for (let i = 0; i < eliminar.length; i++) {
        eliminar[i].addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Esta seguro de eliminar?',
                text: "Este cambio sera permanente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    }
</script>

</html>
