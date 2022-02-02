<!DOCTYPE html>
<html lang="en">
<style>
td {
  
    font-size: 18px;
    text-align: initial;
}
</style>
<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('static/css/style_events.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('static/css/sweetalert2.all.min.js') }}"></script>
    <title>Evento</title>
</head>

<body>

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

        @can('createE', App\Models\Evento::class)
            <a class="btn btn-secondary" href="/eventos/create"><span class="fas fa-plus"></span>Añadir Evento</a>
        @endcan
    </div>
    <div class="container-fluid m-0 p-0 table-responsive">
        <table class="table table-sm table-striped table-hover caption-top">
            <caption class="m-1">
                Listado de eventos
            </caption>

            <thead class="table-dark">

                <th>Nombre</th>
                <th>fecha inicial</th>
                <th>Acciones</th>
                <th>Estado</th>
            </thead>
            @forelse($eventos1 as $evento)

                @if (\Carbon\Carbon::today()->gte($evento->fecha_inicial) & \Carbon\Carbon::today()->lte($evento->fecha_final))
                    @php
                        $estado = 1;
                    @endphp
                @elseif(\Carbon\Carbon::today()->gte($evento->fecha_final))
                    @php
                        $estado = 2;
                    @endphp
                @else
                    @php
                        $estado = 0;
                    @endphp
                @endif
                <tr>
                    <td style="text-align: initial;" class="" width="300px">{{ $evento->nombre_evento }}</td>
                    <td style="text-align: initial;" class="" width="300px">
                        {{ \Carbon\Carbon::parse($evento->fecha_inicial)->format('d/m/Y') }} </td>
                    <td style="text-align: initial;">
                        <div class="d-flex justify-center align-middle ">
                            @can('editeve', $evento)
                                <a class="btn btn-primary m-1" href="/eventos/{{ $evento->id }}/edit">Editar</a>
                            @endcan
                            <a class="btn btn-info m-1" href="/eventos/{{ $evento->id }}">Mostrar</a>
                            <form action="/eventos/{{ $evento->id }}" class="formulario" method="post"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                @can('deleteeve', $evento)
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                @endcan
                            </form>
                        </div>
                        @if ($estado == 1)
                    <td  style="text-align: initial;"class="" width="300px"> Evento Activo <span style="color: #09d909;"
                            class="dis fas fa-circle"></td>

                @elseif($estado == 2)
                    <td style="text-align: initial;" class="" width="300px">Evento Finalizado <span style="color:red;"
                            class="dis fas fa-circle"></span></td>

                @else <td style="text-align: initial;" class="" width="300px">Evento Aun no iniciado <span style="color:#e3e313;"
                            class="dis fas fa-circle"></td>
            @endif



            </center>
            </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">sin registros</td>
            </tr>
            @endforelse
        </table>
    </div>

    </center>
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
