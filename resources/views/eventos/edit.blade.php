<div class="content_bread">
        <ul>
            <li class="item_selected">Eventos > </li>
            <li class="item_selected">Editar Evento</li>
        </ul>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
  
    <title></title>
   
</head>

<body class="cuerpo">
    <center>
    <div class="box">
    <form action="/eventos/{{$eventos1->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <br><h3>Nombre del evento <input type="text" name="nombre" value="{{$eventos1->nombre_evento}}"></h3><br>
        <h3>Fecha de inicio <input type="date" name = "fecha_inicio" value="{{$eventos1->fecha_inicial}}"></h3><br>
        <h3>Fecha de terminación <input type="date" name = "fecha_final" value="{{$eventos1->fecha_final}}"></h3><br>
        <textarea name="descripcion"  cols="60" rows="10"   >{{$eventos1->descripcion}}</textarea><br><br>
        
        <input class="regreso" type="submit" value="Actualizar">
        <a href="/eventos" class="regreso"><span class="fas fa-long-arrow-alt-left"></span> Regresar</a>
    </form>
    </div>
    </center>
</body>
</html>