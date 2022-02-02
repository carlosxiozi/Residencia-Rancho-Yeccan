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

    body {
        background: #D3CCE3;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #E9E4F0, #D3CCE3);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #E9E4F0, #D3CCE3);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    .header-container {
        display: flex;
        background: white;
        height: 70px;
        align-items: center;
        justify-content: center;
        background: #E0EAFC;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #CFDEF3, #E0EAFC);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    span.header-titile {
        align-items: end;
        font-size: 4rem;
    }

    .header-img {
        width: 85px;
        height: 100%;
        border-radius: 50%;
        padding: 0;
        margin: 0;
    }

    .header-img img {
        width: 100%;
        height: 100%;
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
    <div class="container-fluid   text-wrap ">
        <a class="navbar-brand  fs-1 mx-auto" href="/">
            <img src="/static/img/suizo.png" alt="" width="80" height="60" class="d-inline-block align-text-top">
            Rancho Yeccan
        </a>
    </div>
</nav>

<body>
    <div class="container-fluid mt-5 row mx-auto">
        <div style="margin-right: 500px; background: white !important"
            class="row col-xs col-sm col-md col-xl-6 shadow p-2">
            <a style=" 
            right: 0%;
            position: relative; font-size:16px;
        " class="regreso btn btn-primary" href="/"> <span class="fas fa-sign-out-alt"></span>Regresar </a>
            <div class="row p-2 mx-auto">
                @if ($bandera == 1)
                    <div style="font-size: 16px;" class="contenedor">
                        @foreach ($eventos1 as $eventos)
                            @php
                                $i = 1;
                            @endphp
                            @if (is_null($eventos->nota))
                            @else
                                <div class="input-group mb-3">
                                    <label class="input-group-text"> {{ $eventos->nombre_evento }} </label>
                                    <label class="form-control" style="height: auto">
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
                    <div class="input-group mb-3">
                        <span class="input-group-text  fs-2 ">Evento</span><select name="evento_id" id="evento_id"
                            onchange="mostrar()" ;>
                            @foreach ($eventos1 as $eventos)
                                <option value="">Seleccione un evento </option>
                                <option value="{{ $eventos->id }}">{{ $eventos->nombre_evento }}</option>
                            @endforeach
                        </select><br></h3>
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
                <textarea class="form-control  fs-2" name="notas" Onkeyup="charCount();" cols="45" rows="10"
                    placeholder="Escribe las observaciones aqui..." maxlength="500" minlength="3"></textarea>
                <button class="btn btn-primary" name="estadoTrue" value="1"> <span class="far fa-check-circle"></span>
                    Agregar
                </button>
            </form>
        </div>
        @endif


    </div>
    <div class="container-fluid mt-5 row mx-auto">
        <div style="margin-right: 500px; background: white !important"
            class="row col-xs col-sm col-md col-xl-6 shadow p-2">


            <div class="row p-2 mx-auto">
                <button class="btn btn-primary" Onclick="ver()"> <span class="far fa-check-circle"></span>
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

                            <textarea class="form-control" name="comentarios" id="comentarios" cols="20" rows="10"
                                placeholder="Describir que se realizo en la imagen anterior"></textarea> <br>
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
    <div class="container-fluid mt-5 row mx-auto">
        <div style="margin-right: 500px; background: white !important"
            class="row col-xs col-sm col-md col-xl-6 shadow p-2">
            <div class="row p-2 mx-auto">


                @foreach ($trabajador as $trabaja)
                <div class="input-group mb-3">
                    <form action="/evidencias/{{ $trabaja->id }}" class="formulario" method="post"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        @can('deleteEvi', $trabaja)
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        @endcan
                    </form>
                </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fs-2">Nombre</span>
                        <span class="form-control fs-2"> {{ $trabaja->nombre}}</span>
                    </div>
                 
                    <div class="input-group mb-3">

                        <img class="img-fluid img-thumbnail mx-auto d-block" src="{{ asset($trabaja->imagen) }}"
                            alt="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fs-2">Descripcion</span>
                        <span class="form-control fs-2"> {{ $trabaja->comentarios }}</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fs-2">Fecha</span>
                        <span class="form-control fs-2"> {{ \Carbon\Carbon::parse( $trabaja->fecha_evidencia)->format('d/m/Y')  }}</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fs-2">hora</span>
                        <span class="form-control fs-2"> {{ $trabaja->hora_evidencia }}</span>
                    </div>
                @endforeach


            </div>

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
