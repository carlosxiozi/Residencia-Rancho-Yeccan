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
    <h1> Control Productivo </h1>
    </div>
    </center>
    <center>
    <table border="1">
    <thead>
        <th>Nombre</th>
        <th>Fecha de Nacimiento</th>
        <th>Acciones</th>
    </thead>
    <tbody>
    @foreach($productivo as $animal)
        <tr>
            <td class="tabla"><h3>{{$animal->nombre}}</h3></td>
            <td class="tablaimg"><img src="{{ $animal->imagen }}" width="250px"height="150px" class="img_product"></td>
            
        <td>
            <center>
            <button class="btn_edit">Asignar</button>
            </center>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </center>
    
</body>
</html>