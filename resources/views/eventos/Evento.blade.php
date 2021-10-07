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
    <a href="/eventos/create" >añadir evento</a>
    <table border="1">
    <thead>
        <th>Nombre</th>
        <th>fecha</th>
        <th>Acciones</th>
    </thead>
    @forelse($eventos1 as $evento)
    <tr>
        <td class="nombre" width="300px">{{$evento->nombre_evento}}</td>
        <td class="nombre" width="300px">{{$evento->fecha_inicial}}</td>
        <td>
            <center>
            <a class="btn_edit" href="/eventos/{{$evento->id}}/edit">Editar</a>
            <a class="btn_show" href="/eventos/{{$evento->id}}">Mostrar</a>
            <form action="/eventos/{{$evento->id}}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="btn_delete" type="submit">Eliminar</button>
            </form>
            
            
            </center>
        </td>
    </tr>
    @empty
        <tr>
        <td colspan="3">sin registros</td>
        </tr>
    @endforelse
    </table>
    </center>
</body>
</html>