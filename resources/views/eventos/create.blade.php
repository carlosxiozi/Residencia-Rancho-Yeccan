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
    <form action="/eventos" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Nombre del evento</h3><input type="text" name="nombre">
        <h3>Fecha de inicio</h3><input type="date" name = "fecha_inicio">
        <h3>Fecha de terminación</h3><input type="date" name = "fecha_final">
        <h3>Descripcion:</h3><input type="text" name="descripcion"> <br><br>
        <input class="btn" type="submit" value="Agregar">
    </form>
    </div>
    </center>
</body>
</html>