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
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css')}}">
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
    <div class="primario">
        <div class="contenedor">
            <figure>
                <a><img src="static/img/vaca.jpg" alt=""></a>

                <div class="capa">
                    <a href="/animales">
                        <h3>Animales</h3>
                        <p> En animales donde se encuentra todos los registros de animales que estan con opciones de
                            añadir mas o editar estos mismos</p>
                        <p> Presione  click para entrar</p>
                </div>
            </figure>
        </div>
        <div class="contenedor">
            <figure>
                <img src="static/img/eventos.png" alt="">
                <div class="capa">
                    <a href="/eventos">
                        <h3>Eventos</h3>
                        <p> Es donde se colocan los eventos a los animales con las opciones de añadir nuevos eventos o
                            modificarlos</p>
                        <p> Presione  click para entrar</p>
                    </a>
                </div>
            </figure>
        </div>
      
        @can('view', Auth::user())
        <div class="contenedor">
            <figure>
                <a><img src="static/img/vaq.jpg" alt=""></a>

                <div class="capa">
                    <a href="/usuarios">
                        <h3>Usuarios</h3>
                        <p> En animales donde se encuentra todos los registros de animales que estan con opciones de
                            añadir mas o editar estos mismos</p>
                        <p> Presione para entrar</p>
                </div>
            </figure>
        </div>
        @endcan
       
        <div class="contenedor">
            <figure>
                <a><img src="static/img/check.png" alt=""></a>

                <div class="capa">
                    <a href="/tareas">
                        <h3>Tareas</h3>
                        <p> En animales donde se encuentra todos los registros de animales que estan con opciones de
                            añadir mas o editar estos mismos</p>
                        <p> Presione para entrar</p>
                </div>
            </figure>
        </div>   
    </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script src="{{ asset('static/js/libss/mdtoast.min.js') }}"></script>
                <script src="{{ asset('static/js/app.js') }}"></script>
                
</body>

</html>
