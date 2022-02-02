<style>
    li{
        list-style: none;
      
    }
    ul{
        display: flex;
        padding: 5px
    }
    .item_selected{
        color: rgb(255, 255, 255);
        font-size: 18px;
       
    }
    .content_bread{
        background-color: rgba(7, 7, 7, 0.39);
        margin-top: 0;
        margin-bottom: 5px;
    }
</style>
<div class="content_bread">
    <ul>
        
        <li class="item_selected">Eventos > </li>
        <li class="item_selected">Ver eventos</li>
    </ul>
</div>

<style>
    #lbCategoria{
        color: white;
    }
    #lu_c{
        list-style: none
    }
</style>

  
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
        <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
        <title>Ver eventos</title>
    </head>
    <body>
        <div class="container-fluid mt-5 row mx-auto">
            <div style="background: white !important" class="row col-xs col-sm col-md col-xl-6 shadow p-2 mx-auto">
                <a href="/eventos" class="btn btn-info mb-3"><span class="fas fa-long-arrow-alt-left"></span>Regresar</a>
                <div class="input-group mb-3">
                    <span class="input-group-text">Nombre del evento</span>
                    <span class="form-control"> {{$eventos1->nombre_evento}}</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Fecha de inicio</span>
                    <span class="form-control"> {{$eventos1->fecha_inicial}}</span>
                </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Fecha final</span>
                        <span class="form-control"> {{$eventos1->fecha_final}}</span>
                    </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Descripción</span>
                            <span class="form-control"> {{$eventos1->descripcion}}</span>
                        </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Tipo</span>
                                <span class="form-control"> {{$eventos1->tipo}}</span>
                            </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">nota</span>
                                    <span class="form-control"> {{$eventos1->nota}}</span>
                                </div>
        
      
            </div>
        </div>
    </body>
    </html>