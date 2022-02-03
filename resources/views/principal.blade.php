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
    <nav class="navbar navbar-light " style="background: #E0EAFC;
    background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);
    background: linear-gradient(to right, #CFDEF3, #E0EAFC);">
        <div class="container-fluid   text-wrap ">
            <a class="navbar-brand  fs-1 mx-auto" href="/">
                <img src="/static/img/suizo.png" alt="" width="80" height="60" class="d-inline-block align-text-top">
                Rancho Yeccan
            </a>
           
            
            <a  class="btn btn-dark btn-lg" href="/salir"> <span class="fas fa-sign-out-alt"></span>Cerrar Sesión</a>
        </div>
        <label style="font-size:20px; " for="">Bienvenido : {{Auth::user()->nombre}}</label>


    </nav>

    <style>
        .fs-1 {
            font-size: calc(1.35rem + 2.2vw) !important;
        }

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

            border-radius: 20px;
            background: rgba(255, 255, 255, 0.356);
            position: relative;


        }

        .opciones-image {
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 10px;
            cursor: pointer;


        }

        .opciones-image:hover.capa {
            background: red;
            cursor: pointer;

        }

        .opciones-image img {
            width: 100%;
            height: 90%;
            object-fit: contain;

        }



        .opciones-items:nth-child(1) {

            background: #f5f5f5
        }

        .opciones-items:nth-child(2) {
            background: rgba(218, 250, 61, 0.564);
        }

        .opciones-items:nth-child(3) {
            background: #ffffff6b
        }

        .opciones-items:nth-child(4) {

            background: #ffffff6b
        }

        .opciones-items:nth-child(5) {

            background: #ffffff6b
        }

        .opciones-items:nth-child(6) {

            background: #ffffff6b
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
            for (i = 0; i <= 5; i++) {
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
            <div class="opciones-items mx-auto col-sm-12 col-md-12 col-lg-10" style="height: 400px">
                <div class="w-100 mx-auto" style="  height:100%; " id="agenda">
                </div>
            </div>

            <div class="opciones-items p-1  mx-auto col-sm col-md-2 position-relative">
                <a href="/notas">
                    <div class="opciones-image position-absolute">
                        <img src="static/img/notas.png" alt="">
                    </div>
                </a>
                <div class=" p-1" style="height: 150px">

                    <a style="z-index: 100;
                    position: relative;
                    text-decoration: none;" class="fs-3">
                        <h3  class="fw-bold fs-2">Notas</h3>
                        
                       
                    </a>

                </div>
            </div>
            <div class="opciones-items p-1 m-2 col-sm-3 col-md position-relative">
                <a  href="/animales">
                <div class="opciones-image position-absolute">
                    <img src="static/img/cows.png" alt="">
                </div>
            </a>
                <div class="p-2" style="height: 150px">
                    <a style="z-index: 100;
                    position: relative;
                    text-decoration: none;" class="fs-3 " >
                        <h3 class="fw-bold fs-2">Animales</h3>
                       
                      
                    </a>
                </div>

            </div>
            <div class="opciones-items p-1  m-2 col-sm-3 col-md position-relative">
                <a href="/eventos">
                <div class="opciones-image position-absolute">
                    <img src="static/img/photoroom.png" alt="">
                </div>
            </a>
                <div class="p-2" style="height: 150px">
                    <a style="z-index: 100;
                    position: relative;
                    text-decoration: none;" class="fs-3" >
                        <h3 class="fw-bold fs-2">Eventos</h3>
                        
                    </a>
                </div>

            </div>

            @can('view', Auth::user())
                <div class="opciones-items p-1 m-2 col-sm-3 col-md position-relative ">
                    <a href="/usuarios">

                   
                    <div class="opciones-image position-absolute">
                        <img src="static/img/vaquero.png" alt="">
                    </div>
                </a>
                    <div class="p-2" style="height: 150px">
                        <a style="z-index: 100;
                            position: relative;
                            text-decoration: none;" class="fs-2" >
                            <h3 class="fw-bold fs-2">Usuarios</h3>
                         
                        </a>
                    </div>

                </div>
            @endcan

            <div class="opciones-items p-1 m-2 col-sm-3 col-md position-relative">
                <a href="/tareas">

                
                <div class="opciones-image position-absolute">
                    <img src="static/img/tareas.png" alt="">
                </div>
            </a>
                <div class="p-2" style="height: 150px">
                    <a style="z-index: 100;
                    position: relative;
                    text-decoration: none;" class="fs-3" >
                        <h3 class="fw-bold fs-2">Tareas</h3>
                        
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
