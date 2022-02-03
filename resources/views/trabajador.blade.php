<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @laravelPWA
    <link rel="stylesheet" href="{{ asset('static/js/libss/mdtoast.min.css') }}">
    <title>Actividades del dia</title>
</head>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        label.no.eixste {
            margin: 40px;
            font-size: 30px;
        }

        figure.bonita {
            width: auto;
            height: auto;
        }

        img.imagenf {
            width: 60%;
            height: 40%;
            margin: 50px;
        }

        body {}

        .eventos-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            box-shadow: 0px 0px 5px #80808061;
            justify-content: space-around;
            border-radius: 5px;
            margin: 8px;
            font: message-box;
        }


        .evento {
            display: flex;
            flex-direction: column;
            padding: 5px;
            overflow: hidden;
            background: #fff;


            box-shadow: 3px 4px 10px rgb(7 152 251 / 20%);

            border-color: red;
        }

        .animales-container {
            width: 100%;
            height: 100%;
            display: inline-flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .animal-inf,
        .animal-reproductivo,
        .animal-productivo {
            border-bottom: 1px solid;
            padding: 5px;
            font-size: 17px;
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
            font-size: 2rem;
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

        .animal-eve {

            padding: 5px;
            font-size: 17px;
            border-top: 1px solid;
        }

        .animal-body {
            flex: 1;
            font-size: 1.4rem;
            border-top: 1px solid;
            margin: 10px 0;
        }

        .animal-productivo {
            display: flex;
            flex-direction: column;
        }

        .animal {
            display: flex;
            flex-direction: column;
            flex-grow: 1;

            padding: 5px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 5px #80808082;
        }

        .rojo {
            font-size: 17px;
            color: red;
        }

        @media screen and (min-width: 600px) {
            .animal {
                width: min-content;

            }

            label.no.eixste {
                font-size: 35px;
                margin-top: 70px;
                font-family: cursive;
            }

            figure.bonita {
                margin: auto;
                width: 100%;
                height: 100%;
            }

            img.imagenf {
                width: 35%;
                height: 35%;
                margin: 60px;
            }

            span.header-titile {
                align-items: end;
                font-size: 4rem;
            }
        }

        .fs-1 {
            font-size: calc(2.35rem + 1.2vw) !important;
        }

    </style>

    <nav class="navbar navbar-light " style="background: #E0EAFC;
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);
background: linear-gradient(to right, #CFDEF3, #E0EAFC);">
        <div class="container-fluid   text-wrap ">
            <a class="navbar-brand  fs-1 mx-auto" href="/">
                <img src="/static/img/cow.png" alt="" width="80" height="60" class="d-inline-block align-text-top">
                Rancho Yeccan
            </a>
        </div>
    </nav>
    @php
        $noexiste = 0;
    @endphp
    @foreach ($animales as $animal)
        @if ($mostrar == 1)
            @php
                $noexiste = 1;
            @endphp
        @else
        @endif
    @endforeach
    @if ($noexiste == 0)
        <center>
            <label class="no eixste" for="">No hay eventos ni partos existentes </label>
            <figure class="bonita">
                <img class="imagenf" src="/static/img/bonita.gif" alt="">
            </figure>

        </center>
    @else
        @if ($no_eventos == 1)
        @else
            <section class="eventos">
                <div class="eventos-container">
                    <h2 style="width: 100%; padding: 5px;">Eventos Activos: </h2>
                    @foreach ($eventos as $evento)
                        @php
                            $bandera = 0;
                        @endphp
                        @foreach ($var as $event)
                            @if ($evento->id == $event->evento_id)
                                @php
                                    $bandera = 1;
                                @endphp
                            @endif
                        @endforeach
                        @if ($bandera == 1)
                            @php
                                $fechaini = \Carbon\Carbon::createFromDate($evento->fecha_inicial);
                                $fechafin = \Carbon\Carbon::createFromDate($evento->fecha_final);
                            @endphp
                            @if (\Carbon\Carbon::today()->gte($fechaini) & \Carbon\Carbon::today()->lte($fechafin))
                                <div class="evento">
                                    <label for="">Nombre: {{ $evento->nombre_evento }}</label>
                                    <label for="">Descripción: {{ $evento->descripcion }}</label>
                                    <label for="">Fecha inicial:
                                        {{ \Carbon\Carbon::parse($evento->fecha_inicial)->format('d/m/Y') }}</label>
                                    <label for="">Fecha Final:
                                        {{ \Carbon\Carbon::parse($evento->fecha_final)->format('d/m/Y') }}</label>
                                </div>
                            @endif
                        @endif

                    @endforeach
                </div>
            </section>
        @endif
        <section class="animales">
            <div class="container p-2">
                <div class="row g-2 justify-content-evenly">
                    @foreach ($animales as $animal)

                        @php
                            $fechas = 0;
                        @endphp
                        @foreach ($animal->eventos as $fecha)
                            @php
                                $fechaini = \Carbon\Carbon::createFromDate($fecha->fecha_inicial);
                                $fechafin = \Carbon\Carbon::createFromDate($fecha->fecha_final);
                            @endphp
                            @if ((sizeof($animal->eventos) > 0) & \Carbon\Carbon::today()->gte($fechaini) & \Carbon\Carbon::today()->lte($fechafin))
                                @php
                                    $fechas = 1;
                                @endphp
                            @endif
                        @endforeach
                        @if ($fechas == 1)
                            @if ($animal->sexo == 'Hembra')
                                <div style="align-self: inherit;"
                                    class="bg-light col-sm-6 col-md-6 col-lg-4 shadow rounded-1 p-1">
                                    <div class="card" style=" height: 100%">

                                        <img src="{{ $animal->imagen }}" alt=""
                                            class="img-thumbnail rounded w-75 mx-auto card-img-top">
                                        <div class="card-body">
                                            <div class="card-header">
                                                Información del animal
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Animal: {{ $animal->nombre }}</li>
                                                <li class="list-group-item">Arete: {{ $animal->arete }}</li>
                                                <li class="list-group-item"> Sexo: {{ $animal->sexo }}</li>
                                               
                                                    @foreach ($animal->control_reproductivo as $fecha)
                                                        @php
                                                            $nueva_fecha = \Carbon\Carbon::createFromDate($fecha->fecha_de_parto)->subDays(15);
                                                            $fecha_final = \Carbon\Carbon::createFromDate($fecha->fecha_de_parto)->addDays(7);
                                                            $dias = \Carbon\Carbon::now()->diffInDays($fecha->fecha_de_parto);
                                                            $horas = \Carbon\Carbon::now()->diffInHours($fecha->fecha_de_parto) - $dias * 24;
                                                            $hoy = \Carbon\Carbon::now();
                                                            $fechaf = \Carbon\Carbon::createFromDate($fecha->fecha_de_parto);
                                                        @endphp

                                                        @if (\Carbon\Carbon::now()->gte($nueva_fecha) & \Carbon\Carbon::now()->lte($fecha_final))

                                                            @php
                                                                $fechas = 1;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    @php
                                                        $parto = 0;
                                                    @endphp
                                                    @foreach ($animal->control_reproductivo as $controlRep)
                                                        @php
                                                            $nueva_fecha1 = \Carbon\Carbon::createFromDate($controlRep->fecha_de_servicio);
                                                            $fecha_final1 = \Carbon\Carbon::createFromDate($controlRep->fecha_de_parto);
                                                        @endphp

                                                        @if ($controlRep->estado_animal == 0)
                                                            @if (\Carbon\Carbon::today()->gte($nueva_fecha1) & \Carbon\Carbon::today()->lte($fecha_final1))
                                                            <div class="card-header">
                                                                Fechas de servicio
                                                            </div>
                                                           <ul  class="list-group list-group-flush">
                                                            <li class="list-group-item"> Fecha de servicio: {{ \Carbon\Carbon::parse($nueva_fecha1)->format('d/m/Y') }}</li>
                                                            <li class="list-group-item"> Fecha de revision::{{ \Carbon\Carbon::parse($fecha_final1)->format('d/m/Y') }}</li>
                                                           </ul>
                                                               
                                                            @else
                                                            @endif
                                                            @php
                                                                $parto = 0;
                                                            @endphp
                                                        @elseif($controlRep->estado_animal == 1)
                                                            @php
                                                                $parto = 1;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    @if ($parto == 0)
                                                    <li class="list-group-item"> Estado: Sin preñar</li>
                                                        
                                                    @elseif($parto == 1)
                                                    <li class="list-group-item"> Estado: embarazada</li>
                                                        
                                                        @if ($fechas == 1)
                                                            

                                                                @foreach ($animal->control_reproductivo as $controlRep)
                                                                    @if ($controlRep->estado_animal == 0)

                                                                    @elseif($controlRep->estado_animal == 1)

                                                                    <div class="card-header">
                                                                        Fecha de parto
                                                                    </div>
                                                                     <ul  class="list-group list-group-flush">
                                                                        <li class="list-group-item  border border-danger border-2 fw-bold ">  Fechas de aproximación de parto: {{ \Carbon\Carbon::parse($nueva_fecha)->format('d/m/Y') }} -- {{ \Carbon\Carbon::parse($fecha_final)->format('d/m/Y') }}</li>
                                                                        <li class="list-group-item  border border-danger  border-2 fw-bold">  Faltan {{ $dias }} dias con {{ $horas }}  horas para finalizar.</li>
                                                                     </ul>
                                                                    @endif
                                                                @endforeach

                                                      

                                                        @endif
                                                    @endif
                                                
                                            </ul>
                                            <div class="card-header">
                                                Eventos
                                            </div>
                                            @foreach ($animal->eventos as $eventoA)
                                                @php
                                                    $fechaini = \Carbon\Carbon::createFromDate($eventoA->fecha_inicial);
                                                    $fechafin = \Carbon\Carbon::createFromDate($eventoA->fecha_final);
                                                    
                                                @endphp
                                                @if (\Carbon\Carbon::today()->gte($fechaini) & \Carbon\Carbon::today()->lte($fechafin))
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">Evento:
                                                            {{ $eventoA->nombre_evento }}</li>
                                                        <li class="list-group-item">Fecha
                                                            inicial:{{ \Carbon\Carbon::parse($eventoA->fecha_inicial)->format('d/m/Y') }}
                                                        </li>
                                                        <li class="list-group-item">Fecha
                                                            final:{{ \Carbon\Carbon::parse($eventoA->fecha_final)->format('d/m/Y') }}
                                                        </li>
                                                    </ul>
                                                @endif
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            @elseif($animal->sexo == 'Macho')
                                <div style="align-self: inherit;"
                                    class="bg-light col-sm-6 col-md-6 col-lg-4 shadow rounded-1 p-1">
                                    <div class="card" style="height: 100%">
                                        <img class="img-thumbnail rounded w-75 mx-auto card-img-top"
                                            src="{{ $animal->imagen }}" alt="">
                                        <div class="card-header"> Datos del animal</div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Nombre: {{ $animal->nombre }}</li>
                                            <li class="list-group-item"> Arete: {{ $animal->arete }}</li>
                                            <li class="list-group-item"> Sexo: {{ $animal->sexo }}</li>
                                        </ul>
                                        <div class="card-header">Eventos</div>
                                        @foreach ($animal->eventos as $eventoA)
                                            @php
                                                $fechaini = \Carbon\Carbon::createFromDate($eventoA->fecha_inicial);
                                                $fechafin = \Carbon\Carbon::createFromDate($eventoA->fecha_final);
                                            @endphp
                                            @if (\Carbon\Carbon::today()->gte($fechaini) & \Carbon\Carbon::today()->lte($fechafin))
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Nombre del evento:
                                                        {{ $eventoA->nombre_evento }}</li>
                                                    <li class="list-group-item">Fecha inicial:
                                                        {{ \Carbon\Carbon::parse($eventoA->fecha_inicial)->format('d/m/Y') }}
                                                    </li>
                                                    <li class="list-group-item">Fecha final:
                                                        {{ \Carbon\Carbon::parse($eventoA->fecha_final)->format('d/m/Y') }}
                                                    </li>
                                                </ul>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @else
                            @foreach ($animal->control_reproductivo as $fecha)
                                @php
                                    $nueva_fecha = \Carbon\Carbon::createFromDate($fecha->fecha_de_parto)->subDays(15);
                                    $fecha_final = \Carbon\Carbon::createFromDate($fecha->fecha_de_parto)->addDays(7);
                                    $dias = \Carbon\Carbon::now()->diffInDays($fecha_final);
                                    $horas = \Carbon\Carbon::now()->diffInHours($fecha_final) - $dias * 24;
                                    $hoy = \Carbon\Carbon::today()->toDateString();
                                    
                                    $fechaf = \Carbon\Carbon::createFromDate($fecha->fecha_de_parto);
                                    
                                @endphp

                                @if (\Carbon\Carbon::now()->gte($nueva_fecha) & \Carbon\Carbon::now()->lte($fecha_final))
                                    @php
                                        $fechas = 1;
                                    @endphp


                                @endif
                            @endforeach

                            @foreach ($animal->control_reproductivo as $controlRep)
                                @php
                                    $nueva_fecha1 = \Carbon\Carbon::createFromDate($controlRep->fecha_de_servicio);
                                    $fecha_final1 = \Carbon\Carbon::createFromDate($controlRep->fecha_de_parto);
                                @endphp

                                @if ($controlRep->estado_animal == 0)
                                    @if (\Carbon\Carbon::today()->gte($nueva_fecha1) & \Carbon\Carbon::today()->lte($fecha_final1))

                                        <div style="align-self: inherit;"
                                            class="bg-light col-sm-6 col-md-6 col-lg-4 shadow rounded-1 p-1">
                                            <div class="card" style="height: 100%">

                                                <img src="{{ $animal->imagen }}" alt=""
                                                    class="img-thumbnail rounded w-75 mx-auto card-img-top">
                                                <div class="card-header"> Datos del animal</div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Nombre: {{ $animal->nombre }}</li>
                                                    <li class="list-group-item"> Arete: {{ $animal->arete }}</li>
                                                    <li class="list-group-item"> Sexo: {{ $animal->sexo }}</li>
                                                    <li class="list-group-item"> Estado: Sin preñar </li>
                                                   
                                                </ul>
                                                <div class="card-header">Fecha de servicio</div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"> Fecha de servicio:
                                                        {{ \Carbon\Carbon::parse($nueva_fecha1)->format('d/m/Y') }}
                                                    </li>
                                                    <li class="list-group-item"> Fecha de revision:
                                                        {{ \Carbon\Carbon::parse($fecha_final1)->format('d/m/Y') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif

                                @elseif($controlRep->estado_animal == 1)
                                    @if ($fechas == 1)
                                        <div style="align-self: inherit;"
                                            class="bg-light col-sm-6 col-md-6 col-lg-4 shadow rounded-1 p-1">
                                            <div class="card">
                                                <img src="{{ $animal->imagen }}" alt=""
                                                    class="img-thumbnail rounded w-75 mx-auto card-img-top">
                                                <div class="card-header"> Datos del animal</div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Nombre: {{ $animal->nombre }}</li>
                                                    <li class="list-group-item"> Arete: {{ $animal->arete }}</li>
                                                    <li class="list-group-item"> Sexo: {{ $animal->sexo }}</li>
                                                    <li class="list-group-item">Estado: embarazada </li>   
                                                </ul>
                                                <div class="card-header">Fecha de parto</div>
                                                <ul class="list-group list-group-flush">
                                                    <li  class="list-group-item border border-danger border-2 fw-bold">Fecha de aproximacion del parto:
                                                        {{ \Carbon\Carbon::parse($nueva_fecha)->format('d/m/Y') }}--{{ \Carbon\Carbon::parse($fecha_final)->format('d/m/Y') }}
                                                    </li>
                                                    <li  class="list-group-item border border-danger border-2 fw-bold" >Faltan {{ $dias }} dias con {{ $horas }} horas para finalizar </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="{{ asset('static/js/libss/mdtoast.min.js') }}"></script>
        <script src="{{ asset('static/js/app.js') }}"></script>
        <script>
            window.Echo.channel('home').listen('trabajadorEvent', (e) => {
                console.log(e);
                notifica(e)

            })
        </script>
    @endif
</body>

</html>
