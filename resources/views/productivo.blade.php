<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('static/css/css/all.css') }}">
    <script src="{{ asset('static/css/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('static/js/jquery-3.6.0.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Animales</title>
</head>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .animal-eventos {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;

        }

        .nombre {
            color: black;
            font-size: 18px;
            overflow: hidden;
            background: linear-gradient(100deg, #0ad2ff, #0273ff00);
        }

        .descripcion {
            color: black;
            font-size: 15px;


        }

        .animal {
            display: flex;
            align-items: center;
            width: 100%;
            height: 80%;
            flex-wrap: wrap;
            flex-direction: column;
        }

        .evento-container {
            display: flex;
            border-radius: 5px;
            flex-direction: column;
            border: 1px solid;
            width: max-content;
            padding: 8px;
            background-color: white;
            margin: 1.5px;
            padding-right: 25px;
            box-shadow: 1px 1px 5px #000000e8;
        }

        form {
            display: flex;
            flex-direction: column;
            border: 1px solid;
            border-radius: 5px;
            padding: 5px;
            margin: 5px;
            width: max-content;
        }

        .btn1 {
            border: 0 !important;
            cursor: pointer;
            background: red !important;
            border-radius: 50%;
            padding: 5px;
            width: 25px;
            height: 25px;
        }

        .evento-container {
            position: relative;
        }

        .evento-container form {
            border: 0 !important;
            position: absolute;
            padding: 0 !important;
            right: -5px;
            top: -5px;

        }

        .animal-container {
            width: 60%;
            display: flex;
            max-width: 500px;
            height: 250px;
            flex-wrap: nowrap;
            justify-content: flex-start;
            background-image: url('/static/img/azul.jpg');
            flex-direction: row;
            align-items: center;
            background: #9CECFB;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            margin: 8px auto;
        }

        .animal-container .tarjeta {
            width: 100%;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0px 1 px 10px rgba(0, 0, 0, 0, 2);
            cursor: default;
            color: black;
            font-size: 20px;

            text-align: center;

        }

        .animal-container .tarjeta img {
            width: 300px;
            height: 200px;
            border-radius: 8px;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0, 2);
            overflow: hidden;
            text-align: center;
            transition: all 0.25s;
        }

        .animal-container .tarjeta animal-name {
            font-weight: 600;
            color: #black;

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

        .animal-container .tarjeta animal-sec {
            padding: 15px;
            font-size: 200px;
            font-weight: 300;
            color: #black;
            text-decoration: none;

            color: black;
            text-align: center;
        }

        .contenido {
            color: black;
            text-align: center;
            font-size: 15px;
            font-weight: 100;
        }


        .content_bread {
            background-color: #21137e;
            margin-top: 0;
            margin-bottom: 5px;
        }

        li {
            list-style: none;
        }

        ul {
            display: flex;
            padding: 5px
        }

        .item_selected {
            color: rgb(255, 255, 255);
            font-size: 20px;

        }



        .inicio {
            background: #000000;
            color: #fff;
            display: inline-block;
            font-size: 1.00em;
            margin: 0px;
            padding: 10px 0px;
            text-align: center;
            width: 100px;
            box-shadow: 0px 3px 0px #373c3c;
            text-decoration: none;
        }

        .titulo {
            background: #2778c4;
            color: white;
        }

        img {
            width: 200px;
            height: 100px;
        }

        @media screen and (max-width: 600px) {

            img {
                width: 200px;
                height: 100px;
            }

            .img_table:hover {
                transform: scale(2);
            }

            body {
                background: rgb(255, 255, 255);
                color: black;
            }

            span {
                margin-right: 10px;
            }

            tr:nth-child(odd) {
                background: #d5d5d587;
            }
        
    </style>



    <nav class="navbar navbar-light " style="background: #E0EAFC;
 background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);
 background: linear-gradient(to right, #CFDEF3, #E0EAFC);">
        <div class="container-fluid badge  text-wrap ">
            <a class="navbar-brand  fs-1 mx-auto" style="font-size: calc(2.35rem + 1.2vw) !important;" href="/">
                <img src="/static/img/cow.png" style="height: 100px; width:100px;" alt="" width="80" height="60"
                    class="d-inline-block align-text-top">
                Rancho Yeccan
            </a>
        </div>
    </nav>
    <div style="width: max-content;
    margin: auto;">
        <a class="btn btn-secondary" href="/animales"><span class="fas fa-long-arrow-alt-left"></span>Regresar</a>
        <a class="btn btn-dark" href="/"><span class="fas fa-home"></span>Inicio</a>
    </div>



    <div class="content_bread">
        <ul>


            <li class="item_selected">Animales> </li>
            <li class="item_selected">Productivo</li>
        </ul>
    </div>


    <div class="card mb-3" style="max-width: 600px; background: #87ceeb80;
    margin:auto">
        <div class="row g-0">
            <div class="col-md-4" style="  padding-top: 25px;">
                <img src="{{ $animal->imagen }}" alt="" class="animal-image">
            </div>
            <div class="col-md-8" >
                <div class="card-body">
                    <h5 class="card-title" > Nombre:
                        {{ $animal->nombre }} </h5>
                    <p class="card-text"><label for="" class="animal-sec">Sexo:
                            {{ $animal->sexo }}</label><br>
                        <label for="" class="animal-sec">Fecha de nacimiento:
                            {{ $animal->fecha_de_nacimiento }}</label><br>
                        <label for="" class="animal-sec">Peso al destete:
                            {{ $animal->peso_al_destete }}</label><br>
                        <label for="" class="animal-sec">Arete: {{ $animal->arete }}</label>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <div class="animal-eventos">
        @foreach ($animal->eventos as $evento)

            <div class="evento-container">

                <form action="/controles_productivos/{{ $animal->id }}" class="formulario" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="evento_animal" value="{{ $evento->pivot->id }}" />
                    <input type="hidden" name="evento_id" value="{{ $evento->id }}">

                    <button class="btn1 fas fa-trash-alt"></button>
                </form>
                <div class="nombre">
                    <label for="">Evento: {{ $evento->nombre_evento }}</label>
                </div>
                <div class="descripcion">
                    <label>Fecha inicial:{{ $evento->fecha_inicial }}</label><br>
                    <label>Fecha final: {{ $evento->fecha_final }}</label>
                </div>


            </div>
        @endforeach
    </div>
    </section>
    <div class="animal-evento">
        <label for="" class="evento"></label>
        <form action="/controles_productivos" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $animal->id }}">
            @php
                $bandera5 = 0;
            @endphp
            @foreach ($eventos as $evento)
                @php
                    $bandera4 = 0;
                @endphp
                @foreach ($animal->eventos as $eventoanimal)
                    @if ($evento->id == $eventoanimal->pivot->evento_id)
                        @php
                            $bandera5 = $bandera5 + 1;
                            $bandera4 = 1;
                        @endphp
                    @endif
                @endforeach

                @if ($bandera4 == 0)
                    <label for="">
                        <input type="checkbox" value="{{ $evento->id }}" name="eventos[]"
                            class="animal-evento_name">{{ $evento->nombre_evento }}
                    </label>
                @endif
            @endforeach
            @if (sizeof($eventos) == 0)
                <label> No hay eventos existentes </label>
            @elseif(sizeof($eventos) == $bandera5)
                <label> No hay mas eventos disponibles </label>
            @else
                <button Onclick="notify()" class="btn btn-primary"type="submit">Enviar</button>
            @endif
        </form>
        <script>
            function notify() {
                const options = {

                    body: "Se Agrego un nuevo evento para: {{ $animal->nombre }}",

                    icon: '/static/img/toro.png',
                    image: "{{ $animal->imagen }}",
                    interactionTimeout: 2000,

                };

                new Notification('Rancho Yeccan', options);
            }
        </script>




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
        </script>
    </div>

</body>

</html>
