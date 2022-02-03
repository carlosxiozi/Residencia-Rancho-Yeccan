<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Notas</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
    }

</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('static/css/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<title>Notas</title>
</head>

<nav class="navbar navbar-light " style="background: #E0EAFC;
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);
background: linear-gradient(to right, #CFDEF3, #E0EAFC);">
    <div class="container   text-wrap ">
        <a class="navbar-brand  fs-1 mx-auto" href="/">
            <img src="/static/img/suizo.png" alt="" width="80" height="60" class="d-inline-block align-text-top">
            Rancho Yeccan
        </a>
    </div>
</nav>

<body>
    <div class="">
        <div style=" background: white !important; " class="row shadow container mx-auto">
            <a class="btn btn-primary w-100" href="/"> <span class="fas fa-sign-out-alt"></span>Regresar </a>
            <div class="col-sm col-md-7 p-2 mx-auto">
                @if ($bandera == 1)
                    <div class=">
                        @foreach ($eventos1 as $eventos)
                            @php
                                $i = 1;
                            @endphp
                            @if (is_null($eventos->nota))
                            @else
                                <div class="
                        input-group mb-3">
                        <label class="input-group-text" style="font-size:16px;">
                            {{ $eventos->nombre_evento }} </label>
                        <label class="form-control" style="height: auto; font-size:16px;">
                            @php
                                $j = 1;
                                $notas = explode('_', $eventos->nota);
                                for ($i = 0; $i < sizeof($notas); $i++) {
                                    echo nl2br($j . '.- ' . $notas[$i] . "\n");
                                    $j = $j + 1;
                                }
                            @endphp
                        </label><br>
                    </div>
                @endif
                @endforeach
            </div>
            <div class="mb-3 input-group col-sm col-md-7">
                <span class="input-group-text  fs-2 ">Evento</span>
                <select class="form-select fs-3" name="evento_id" id="evento_id" onchange="mostrar()" ;>
                    @foreach ($eventos1 as $eventos)
                        <option value="">Seleccione un evento </option>
                        <option value="{{ $eventos->id }}">{{ $eventos->nombre_evento }}</option>
                    @endforeach
                </select>
            </div>
            <script type="text/javascript">
                function mostrar() {
                    let cod = document.getElementById('evento_id').value;
                    let formNotes = document.getElementById('form_notas');
                    //let seleccion = document.getElementById('seleccion');
                    formNotes.setAttribute('action', '/eventos/' + cod);
                    //seleccion.innerHTML = "Evento"+;
                    formNotes.style.display = "block";
                }
            </script>
            <div>
            </div>
            </form>
        </div>

        <form id="form_notas" method="post" style="display:none;">
            @csrf
            @method('PUT')
            <h2 id="seleccion"></h2>
            <textarea style="resize: none" class="form-control  fs-2" name="notas" Onkeyup="charCount();" rows="5"
                placeholder="Escribe las observaciones aqui..." maxlength="500" minlength="3"></textarea>
            <div class="d-flex justify-content-center p-2">
                <button class="btn btn-primary fs-2" name="estadoTrue" value="1"> <span
                        class="far fa-check-circle"></span>
                    Agregar
                </button>
            </div>
        </form>
    </div>
    @endif


    </div>
    <div class="container mt-5 row mx-auto">
        <div style="background: white !important" class="row  shadow p-2 mx:auto">


            <div class="row p-2 mx-auto">
                <button class="btn btn-primary" style="height: auto; font-size:16px;" Onclick="ver()"> <span
                        class="far fa-check-circle"></span>
                    Añadir Evidencia
                </button>
                <script type="text/javascript">
                    function ver() {

                        let form_evi = document.getElementById('form_evi');
                        form_evi.style.display = "block";
                    }
                </script>
                <form action="/evidencias" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row p-2 mx-auto" id="form_evi" style="display: none;">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text ">Descripcion </span>

                            <textarea class="form-control" name="comentarios" id="comentarios" rows="5"
                                style="resize: none" placeholder="Describir que se realizo en la imagen"></textarea>
                            <br>
                        </div>
                        <div class="input-group mb-3">

                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">

                        </div>

                        <button class="btn btn-primary" type="submit"><span class="far fa-check-circle"></span> Agregar
                        </button>
                    </div>



                </form>
            </div>
        </div>

    </div>
    <div class="container mt-5  mx-auto">
        <label style="font-size:22px " for="">Evidencias: </label>
        <div style="background: rgb(253, 252, 252) !important" class="row g-3 justify-content-evenly">
            @foreach ($trabajador as $trabaja)
                <div class="bg-light col-sm-6 col-md-6 col-lg-4 shadow rounded-1 " >
                    <div class="input-group my-3">
                        <span class="input-group-text fs-2">Descripcion</span>
                        <span class="form-control fs-2" style="height: auto"> {{ $trabaja->nombre }}</span>
                    </div>
                    <div class="input-group mb-3">
                        <img class="img-fluid img-thumbnail mx-auto d-block" src="{{ asset($trabaja->imagen) }}"
                            alt="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fs-2">Descripcion</span>
                        <p class="form-control fs-2" style="height: auto"> {{ $trabaja->comentarios }}</p>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fs-2">Fecha</span>
                        <span style="height: auto" class="form-control fs-2">
                            {{ \Carbon\Carbon::parse($trabaja->fecha_evidencia)->format('d/m/Y') }}</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fs-2">hora</span>
                        <span style="height: auto" class="form-control fs-2"> {{ $trabaja->hora_evidencia }}</span>
                    </div>
                    <div class="input-group mb-3">
                        <form action="/evidencias/{{ $trabaja->id }}" class="mx-auto" method="post"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            @can('deleteEvi', $trabaja)
                                <button class="btn btn-danger" type="submit"
                                    style="height: auto; font-size:16px;">Eliminar</button>
                            @endcan
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
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
