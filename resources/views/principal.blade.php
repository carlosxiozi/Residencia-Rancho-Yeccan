<!DOCTYPE html>
<html lang="en">

<head>
    @laravelPWA
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('static/css/principal.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('static/js/libss/mdtoast.min.css') }}">
    <title>Animales</title>
</head>

<body>
    <header class="header">

        <div class="header-container">
            <figure class="header-img">
                <img src="/static/img/suizo.png" alt="">
            </figure>
            <span class="header-titile">Rancho Yeccan</span>
            <a style=" 
                right: -26%;
                position: relative;
            " class="regreso btn btn-primary" href="/salir"> <span class="fas fa-sign-out-alt"></span>Cerrar Sesión</a>
        </div>


    </header>
    <center>
        <h1>Seleccione la opción a elegir</h1>
    </center>
    <style>
        /* .opciones-container {
            width: 80vw;
    height: 100vh;
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin: auto;
    align-content: flex-end
        } */
        .opciones-container {
            width: 80vw;
            height: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(4, min-content);
            margin: auto;
            gap: 10px;

        }

        .opciones-items {
           
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.356);
            position: relative;
            
        }

        .opciones-image {
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 10px;


        }

        .opciones-image img {
            width: 100%;
            height: 90%;
            object-fit: contain;

        }

        .opciones-body {
            position: relative;
            z-index: 100;
        }

        .opciones-items:nth-child(1) {

            background: rgb(254, 253, 255);
        }

        .opciones-items:nth-child(2) {
            background: rgba(227, 252, 1, 0.4);
        }

        .opciones-items:nth-child(3) {
            background: rebeccapurple;
        }

        .opciones-items:nth-child(4) {

            background: rebeccapurple;
        }

        .opciones-items:nth-child(5) {

            background: rebeccapurple;
        }

        .opciones-items:nth-child(6) {

            background: rebeccapurple;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>
    <script src="{{ asset('static/js/jquery-3.6.0.min.js') }}"></script>
    <script>
        /*fetch("/calendar")
            .then((res ) =>res.json())
            .then((data) => console.log(data));*/
            
           
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('agenda');
            for(i=0;i<=5;i++){
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',

                locale: "es",

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title'
                },
                height: '100 %',
                
                events: "{{ url('/calendar') }}"
            });
            }


            calendar.render();
        });
    </script>
    <div class="container mx-auto ">
        <div class="row p-1">
            <div class="opciones-items mx-auto col-sm-12 col-md-12 col-lg-10" style="height: 450px" >
                <div class="w-75 mx-auto" style="  height:100%; "id="agenda" >
                </div>
            </div>

            <div class="opciones-items p-1  mx-auto col-sm col-md-2">
                <div class="opciones-image">
                    <img src="static/img/notas.png" alt="">
                </div>
                <div class="p-2">
                    <a href="/notas">
                        <h3>Notas</h3>
                        <label>En este apartado se mostraran las notas hechas por cada uno de los
                            evento.</label><br>
                        <label>Presione para entrar</label>
                    </a>
                </div>
            </div>
            <div class="opciones-items p-1 m-2 col-sm-3 col-md">
                <div class="opciones-image">
                    <img src="static/img/cows.png" alt="">
                </div>
                <div class="p-2">
                    <a href="/animales">
                        <h3>Animales</h3>
                        <p> En animales donde se encuentra todos los registros de animales que estan con opciones de
                            añadir mas o editar estos mismos</p>
                        <p> Presione click para entrar</p>
                    </a>
                </div>

            </div>
            <div class="opciones-items p-1  m-2 col-sm-3 col-md">
                <div class="opciones-image">
                    <img src="static/img/photoroom.png" alt="">
                </div>
                <div class="p-2">
                    <a href="/eventos">
                        <h3>Eventos</h3>
                        <p> Es donde se colocan los eventos a los animales con las opciones de añadir nuevos eventos
                            o
                            modificarlos</p>
                        <p> Presione click para entrar</p>
                    </a>
                </div>

            </div>

            @can('view', Auth::user())
                <div class="opciones-items p-1 m-2 col-sm-3 col-md">
                    <div class="opciones-image">
                        <img src="static/img/vaquero.png" alt="">
                    </div>
                    <div class="p-2">
                        <a href="/usuarios">
                            <h3>Usuarios</h3>
                            <p> En animales donde se encuentra todos los registros de animales que estan con opciones de
                                añadir mas o editar estos mismos</p>
                            <p> Presione para entrar</p>
                        </a>
                    </div>

                </div>
            @endcan

            <div class="opciones-items p-1 m-2 col-sm-3 col-md">
                <div class="opciones-image">
                    <img src="static/img/tareas.png" alt="">
                </div>
                <div class="p-2">
                    <a href="/tareas">
                        <h3>Tareas</h3>
                        <p> En animales donde se encuentra todos los registros de animales que estan con opciones de
                            añadir mas o editar estos mismos</p>
                        <p> Presione para entrar</p>
                    </a>

                </div>

            </div>
        </div>
    </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('static/js/libss/mdtoast.min.js') }}"></script>
    <script src="{{ asset('static/js/app.js') }}"></script>

</body>

</html>
