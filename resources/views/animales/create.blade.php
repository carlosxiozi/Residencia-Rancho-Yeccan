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
    <script src="{{ asset('static/css/sweetalert2.all.min.js') }}"></script>

    <title></title>

</head>


<body class="cuerpo">


    <div class="content_bread">
        <ul class="h3">

            <li class="item_selected">Animales > </li>
            <li class="item_selected">Agregar Animal</li>
        </ul>
    </div>
    <div class="container-fluid mt-5 row mx-auto">
        <form style="background: white !important" class="row col-xs col-sm col-md col-xl-5 shadow p-2 mx-auto" id="form"
            name="form" action="/animales" method="post" enctype="multipart/form-data">
            @csrf
            <a href="/animales" class="btn btn-info"><span class="fas fa-long-arrow-alt-left"></span> Regresar</a>
            <div class="row p-2 mx-auto">

                <div class="input-group mb-3">
                    <span class="input-group-text">Nombre: </span>
                    <input class="form-control" type="text" name="nombre" class=""
                        value="{{ old('nombre') }}">
                    {!! $errors->first('nombre', '<small>:message</small>') !!}
                    <input type="hidden" id="id_madre" name="madre_id" value="{{ $madre_id }}">
                </div>

                @if ($fecha_parto)
                    <div class="input-group mb-3">
                        <span class="input-group-text">Fecha de nacimiento: </span>
                        <input class="form-control" type="text" readonly name="fecha_de_nacimiento"
                            value="{{ $fecha_parto }}">
                    </div class="input-group mb-3">
                @else
                    <div class="input-group mb-3">
                        <span class="input-group-text">Fecha de nacimiento:</span>
                        <input class="form-control" type="date" name="fecha_de_nacimiento" class=""
                            value="{{ old('fecha_de_nacimiento') }}"> {!! $errors->first('fecha_de_nacimiento', '<small>:message</small>') !!}
                    </div>
                @endif
                <div class="input-group mb-3">
                    <span class="input-group-text">Padre: </span>
                    <input class="form-control" type="text" name="padre" class=""
                        value="{{ old('padre') }}">
                    {!! $errors->first('padre', '<small>:message</small>') !!}
                </div>
                @if ($madre_arete)
                    <div class="input-group mb-3">

                        <span class="input-group-text">Arete</span>
                        <input class="form-control" type="text" readonly name="arete" value="{{ $madre_arete }}">
                    </div>
                @else
                    <div class="input-group mb-3">
                        <span class="input-group-text">Arete: </span>
                        <input class="form-control" type="text" name="arete" class=""
                            value="{{ old('arete') }}">
                        {!! $errors->first('arete', '<small>:message</small>') !!}
                    </div>
                @endif
                <div class="input-group mb-3">
                    <span class="input-group-text">Peso al nacer: </span>
                    <input class="form-control" type="number" name="peso_al_nacer" class=""
                        value="{{ old('peso_al_nacer') }}"> {!! $errors->first('peso_al_nacer', '<small>:message</small>') !!}

                </div>
                <div class="input-group mb-3">

                    <span class=" input-group-text">Peso al destete:</span>
                    <input class="form-control" type="number" name="peso_al_destete" class=""
                        value="{{ old('peso_al_destete') }}"> {!! $errors->first('peso_al_destete', '<small>:message</small>') !!}
                </div>
                @if ($madre_nombre)
                    <div class="input-group mb-3">
                        <span class="input-group-text">Madre:</span>
                        <input class="form-control" type="text" readonly name="madre" value="{{ $madre_nombre }}">
                    </div>
                @else
                    <div class="input-group mb-3">
                        <span class="input-group-text">Madre: </span>
                        <input class="form-control" id="" type="text" name="madre">
                    </div>
                @endif
                <div class="input-group mb-3">
                    <span class="input-group-text"> Sexo:</span>
                    <select class="select" name="sexo" id="sexo">
                        <option value="">Elija uno</option>
                        <option>Macho</option>
                        <option>Hembra</option>
                    </select>
                    {!! $errors->first('sexo', '<small>:message</small>') !!}

                </div>
                <div class="input-group mb-3">

                    <label class=" input-group-text" for="inputGroupFile01">Imagen</label>
                    <input type="file" class="form-control" name="imagen" id="inputGroupFile01" accept="image/*">
                    @error('imagen') <small>{{ $message }}</small> @enderror
                </div>
                <button class="btn btn-primary" type="submit"><span class="far fa-check-circle"></span> Agregar
                    Animal</button>

            </div>
        </form>
    </div>


    {{ Session::get('madre_id') }}
</body>


@if (Session::get('message'))

    </script>
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Se agrego correctamente',
            showConfirmButton: false,
            timer: 1500

        })
    </script>
@endif

</html>
