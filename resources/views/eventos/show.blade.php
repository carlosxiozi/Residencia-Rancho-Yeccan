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
        <title>Document</title>
    </head>
    <body>
    <lu id="lu_c">
        <center>
        <br><br> <li><label class="" id="lbCategoria">Nombre del evento: {{$eventos1->nombre_evento}}</label></li> <br><br>
        <li><label id="lbCategoria">Fecha de inicio: {{$eventos1->fecha_inicial}}</label></li><br><br>
        <li><label id="lbCategoria">Fecha de terminación: {{$eventos1->fecha_final}}</label></li><br><br>
        <li><label id="lbCategoria">Descripción: {{$eventos1->descripcion}}</label></li><br><br>
        <a class=regreso href="/eventos">Regresar</a>
</center>
    </lu>
    
    </body>
    </html>