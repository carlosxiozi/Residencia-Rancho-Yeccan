<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_animals.css') }}">
    <title>Animales</title>
</head>
<body>
    <center>
    <div class=titulo>
    <h1> Animales </h1>
    </div>
    </center>
    <center>
    <a>Agregar animales</a>
    <table border="1">
    <thead>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </thead>
    <tr>
        <td class="nombre" width="300px">Bonita</td>
        <td class="imagen" width="300px"><img class="img_table"src="static/img/vaca.jpg"></td>
        <td>
            <center>
            <button class="btn_edit">Editar</button>
            <button class="btn_show">Mostrar</button>
            <button class="btn_delete">Eliminar</button>
            <button class="btn_pro">Control Productivo</button>
            <button class="btn_repro">Control Reproductivo</button>
            </center>
        </td>
    </tr>
    </table>
    </center>
</body>
</html>