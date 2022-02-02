<div class="content_bread">
    <ul>
        <li class="item_selected">Eventos > </li>
        <li class="item_selected">Crear Evento</li>
    </ul>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        src = "{{ asset('static/css/sweetalert2.all.min.js') }}" >
    </script>
    <title></title>

</head>

<body class="cuerpo">

    <div class="container-fluid mt-5 row mx-auto">

        <form style="background: white !important" class="row col-xs col-sm col-md col-xl-5 shadow p-2 mx-auto"
            action="/eventos" method="post" id="formulario" enctype="off">
            
            <a href="/eventos" class="btn btn-info"><span class="fas fa-long-arrow-alt-left"></span> Regresar</a>
            <div class="row p-2 mx-auto">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text">Nombre del evento: </span>
                    <input class="form-control" type="text" name="nombre" class="animalinformation"
                        value="{{ old('nombre') }}"> <br> {!! $errors->first('nombre', '<small>:message</small>') !!}
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Fecha de inicio: </span>
                    <input class="form-control" type="date" name="fecha_inicio" class="animalinformation"
                        value="{{ old('fecha_inicio') }}"> <br> {!! $errors->first('fecha_inicio', '<small>:message</small>') !!}
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Fecha de terminacion: </span>
                    <input class="form-control" type="date" name="fecha_final" class="animalinformation"
                        value="{{ old('fecha_final') }}"> <br> {!! $errors->first('fecha_final', '<small>:message</small>') !!}
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Descripción </span>
                    <textarea class="form-control" name="descripcion" id="" cols="20" rows="10"
                        placeholder="Escriba una descripción del siguiente evento"></textarea> <br>
                    <h3>{!! $errors->first('descripcion', '<small>:message</small>') !!}</h3><br>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"> Sexo:</span><select name="tipo" id="tipo">
                        <option value="">Elija uno</option>
                        <option>General</option>
                        <option>Individual</option>
                    </select>

                    {!! $errors->first('tipo', '<small>:message</small><br>') !!}
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"> Ingrese una nota Opcional:
                        <textarea class="form-control" name="nota" id="" cols="20" rows="10"
                            placeholder="Anotacion importante para el evento"></textarea>
                </div>
                <button class="btn btn-primary" type="submit"><span class="far fa-check-circle"></span>Agregar nuevo
                    evento</button>
            </div>
        </form>
    </div>


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
