<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_animals.css') }}">
    <title>Evento</title>
</head>
<body>
    <center>
    <div class=titulo>
    <h1> Evento </h1>
    </div>
    </center>
    <center>
    <a>añadir evento</a>
    <table border="1">
    <thead>
        <th>Nombre</th>
        <th>fecha</th>
        <th>Acciones</th>
    </thead>
    <tr>
        <td class="nombre" width="300px">Vacuna de vitanimas</td>
        <td class="nombre" width="300px">12/12/2021</td>
        <td>
            <center>
            <button class="btn_edit">Editar</button>
            <button class="btn_show">Mostrar</button>
            <button class="btn_delete">Eliminar</button>
            
            </center>
        </td>
    </tr>
    </table>
    </center>
</body>
</html>