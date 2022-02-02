<!DOCTYPE html>
<html lang="en">

<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('static/css/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('static/css/sweetalert2.all.min.js') }}"></script>
    <title>Animales</title>
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

    <div class="d-block m-2">
        <center>
            <a class="btn btn-dark" href="/"><span class="fas fa-home"></span>Inicio</a>
            @can('createA', App\Models\Animal::class)
                <tr class="btn_agregar">
                    <td colspan="3"><a class="btn btn-secondary" href="/animales/create"><span
                                class="fas fa-plus"></span>Agregar
                            Animal</a></td>
                </tr>
            @endcan
        </center>
    </div>
    <div class="row my-1 g-2 justify-content-end">
        <div class="col-sm col-md-6 col-lg-3">

            <form id="form_notas" action="/cambio">
                @csrf
                @method('GET')
                <div class=" input-group">
                    <span class="d-inline input-group-text">Ordenar por</span>
                    <select class="d-inline form-select" name="filtro" id="sexo">
                        <option selected>Seleccione uno</option>
                        <option value="0">Fecha de nacimiento</option>
                        <option value="1">Macho</option>
                        <option value="2">Hembra</option>

                    </select>
                    <button id="boton" class="btn_acep btn btn-primary" name="estadoTrue">Filtrar</button>
                </div>
            </form>
        </div>
        <div class="col-sm col-md-6 col-lg-5">
            <form action="{{ route('animales.index') }} " method="get" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="texto">
                <button class="btn btn-outline-success" type="submit" value="Buscar">Buscar</button>
            </form>
        </div>
    </div>
    <div class="container-fluid m-0 p-0 table-responsive">
        <table class="table table-sm table-striped table-hover caption-top">
            <caption class="m-1">
                Lista de animales
            </caption>


            <thead class="table-dark">
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse($animales1 as $animal)
                    <tr>
                        <td class="">
                            <h3>{{ $animal->nombre }}</h3>
                        </td>
                        <td class=""><img src="{{ $animal->imagen }}" width="250px" height="150px"
                                class=""></td>
                        <td>
                            <div class="d-flex justify-center align-middle ">
                                @can('editA', $animal)
                                    <a class="btn btn-primary m-1" href="/animales/{{ $animal->id }}/edit">Editar</a>
                                @endcan
                                <a class="btn btn-info m-1" href="/animales/{{ $animal->id }}">Mostrar</a>
                                <form name="formulario" id="formulario" action="/animales/{{ $animal->id }}" class="formulario" method="post"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    @can('deleteA', $animal)
                                        <button class="btn bg-danger " type="submit">Eliminar</button>
                                    @endcan
                                </form>
                                @can('controlProductivoReproductivo', $animal)
                                    @if ($animal->sexo == 'Hembra')
                                        <a href="/controles_reproductivos/{{ $animal->id }}"
                                            class="btn btn-success m-1">Control reproductivo</a>
                                    @endif
                                    <a href="/control_productivo/{{ $animal->id }}" class="btn btn-warning m-1">
                                        Control productivo
                                    </a>
                                @endcan
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">sin registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        eliminar1 = document.getElementsByClassName('formulario');
        for (let i = 0; i < eliminar1.length; i++) {
            eliminar1[i].addEventListener('submit', function(e) {
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

        function mostrar() {
            let cod = document.getElementById('sexo').value;
            let formNotes = document.getElementById('form_notas');
            //let seleccion = document.getElementById('seleccion');
            formNotes.setAttribute('action', '/cambio/' + cod);
            //seleccion.innerHTML = "Evento"+;
            boton.style.display = "block";

        }
    </script>
</body>


</html>
