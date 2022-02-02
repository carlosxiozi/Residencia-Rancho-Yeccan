<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <title></title>

</head>

<body class="cuerpo">



    <div class="content_bread">
        <ul>

            <li class="item_selected">Animales > </li>
            <li class="item_selected">Editar Animal</li>
        </ul>
    </div>
    <div class="container-fluid mt-5 row mx-auto">
        <form style="background: white !important" class="row col-xs col-sm col-md col-xl-5 shadow p-2 mx-auto"
            action="/animales/{{ $animales1->id }}" method="post" enctype="multipart/form-data">
            <a href="/animales" class="btn btn-info"><span class="fas fa-long-arrow-alt-left"></span> Regresar</a>

            @csrf
            @method('PUT')
            <div class="row p-2 mx-auto">

                <div class="input-group mb-3">
                    <span class="input-group-text">Nombre: </span>
                    <input class="form-control" type="text" name="nombre" value="{{ $animales1->nombre }}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Fecha de nacimiento:</span>
                    <input class="form-control" type="date" name="fecha_de_nacimiento"
                        value="{{ $animales1->fecha_de_nacimiento }}">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Padre: </span>
                    <input class="form-control" type="text" name="padre" value="{{ $animales1->padre }}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Arete: </span>
                    <input class="form-control" id="correos" type="text" name="arete"
                        value="{{ $animales1->arete }}">

                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Peso al nacer: </span>
                    <input class="form-control" id="correos" type="text" name="peso_al_nacer"
                        value="{{ $animales1->peso_al_nacer }}">

                </div>
                <div class="input-group mb-3">

                    <span class=" input-group-text">Peso al destete:</span>
                    <input class="form-control" id="correos" type="text" name="peso_al_destete"
                        value="{{ $animales1->peso_al_destete }}">
                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text">Madre: </span>
                    <input class="form-control" id="correos" type="text" name="madre"
                        value="{{ $animales1->madre }}">

                </div>

                <div class="input-group mb-3">

                    <span class="input-group-text"> Sexo:</span>
                    <select name="clasificacion" id="sexo" value="{{ $animales1->sexo }}">
                        <option>{{ $animales1->sexo }}</option>
                        <option>Macho</option>
                        <option>Hembra</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label class=" input-group-text" for="inputGroupFile01">Imagen</label>
                    
                    <input type="file" class="form-control" name="imagen" id="inputGroupFile01"
                        value="{{ $animales1->imagen }}" accept="image/*"> <img src="{{ $animales1->imagen }}">
                
                
    
                </div>

               

                <input class="btn btn-primary" type="submit" value="Actualizar">
            </div>
        </form>
    </div>
    

</body>

</html>
</select>
