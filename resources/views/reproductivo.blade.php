<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_animals.css') }}">
    <title>Reproductivo</title>
</head>
<body>
    <center>
    <div class=titulo>
    <h1> Control Reproductivo </h1>
    </div>
    </center>
    <center>
    <table border="1">
    <thead>
        <th>Nombre</th>
        <th>Fecha de revision o parto</th>
        <th>Acciones</th>
    </thead>
    <tr>
        <td class="nombre_pro" width="400px">Bonita</td>
        <td class="fecha_naci" width="400px">30/10/2020</td>
        <td>
            <center>
            <button class="btn_edit">revisar</button>
            <button class="btn_edit">Eliminar</button>
            </center>
        </td>
    </tr>
    </table>
    </center>
</body>
</html>