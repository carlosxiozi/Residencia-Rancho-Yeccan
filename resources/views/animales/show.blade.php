<div class="content_bread">
    <ul>

        <li class="item_selected">Animales > </li>
        <li class="item_selected">Ver animales</li>
    </ul>
</div>

<style>
    #lbCategoria {
        color: white;
    }

    #lu_c {
        list-style: none
    }

    img:hover {
        /* background: red; */
        transform: scale(2.0);
    }

</style>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Ficha Tecnica</title>
</head>

<body>
    <div class="container-fluid mt-5 row mx-auto">
        <div style="background: white !important" class="row col-xs col-sm col-md col-xl-6 shadow p-2 mx-auto">
        <a href="/animales" class="btn btn-info mb-3"><span class="fas fa-long-arrow-alt-left"></span>Regresar</a>
        <a class="btn btn-warning mb-3" target="_blank" href="/pdf/{{$animales1->id}}">Imprimir en ficha del animal</a>

            <div class="input-group mb-3">
                <span class="input-group-text">Nombre</span>
                <span class="form-control">{{ $animales1->nombre }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Fecha de nacimiento</span>
                <span class="form-control">{{ $animales1->fecha_de_nacimiento }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Padre</span>
                <span class="form-control">{{ $animales1->padre }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Sexo</span>
                <span class="form-control">{{ $animales1->sexo }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Arete</span>
                <span class="form-control"> {{ $animales1->arete }}</span>
            </div>
            <div  class="input-group mb-3">
                <span class="input-group-text">Peso al nacer</span>
                <span class="form-control">{{ $animales1->peso_al_nacer }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Peso al destete</span>
                <span class="form-control">{{ $animales1->peso_al_destete }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Madre</span>
                <span class="form-control">{{ $animales1->madre }}</span>
            </div>
            <div  class="input-group mb-3">
                <span class="input-group-text">Numeros de partos</span>
                <span class="form-control">{{ $animales1->num_parto }}</span>
            </div>
            <div  class="input-group mb-3">
                <span class="input-group-text">Imagen</span>
            </div>
            <div  class="input-group mb-3">
                <img class="img-fluid img-thumbnail mx-auto d-block" src="{{ asset($animales1->imagen) }}" alt="">
            </div>
        </div>
    </div>

</body>

</html>
