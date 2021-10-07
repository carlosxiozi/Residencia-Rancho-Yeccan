<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_animals.css') }}">
    <title></title>
   
</head>

<body class="cuerpo">
    <center>
    <div class="box">
    <form action="/eventos/{{$eventos1->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h3>Nombre del evento</h3><input type="text" name="nombre" value="{{$eventos1->nombre_evento}}">
        <h3>Fecha de inicio</h3><input type="date" name = "fecha_inicio" value="{{$eventos1->fecha_inicial}}">
        <h3>Fecha de terminación</h3><input type="date" name = "fecha_final" value="{{$eventos1->fecha_final}}">
        <h3>Descripcion:</h3><input type="text" name="descripcion" value="{{$eventos1->descripcion}}"> <br><br>
        <input class="btn" type="submit" value="Agregar">
    </form>
    </div>
    </center>
</body>
</html>