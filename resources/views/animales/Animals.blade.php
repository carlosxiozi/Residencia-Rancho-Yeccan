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
    <tr class="btn_agregar"><td colspan="3"><a href="/animales/create">Agregar categoria</a></td></tr>
    <table border="1">
    <thead>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </thead>
    <tbody>
    @forelse($animales1 as $animal)
        <tr>
            <td>{{$animal->nombre}}</td>
            <td><img src="{{ $animal->imagen }}" width="250px"height="150px" class="img_product"></td>
        <td>
      
        <a class="acciones" href="/animales/{{$animal->id}}/edit">Editar</a>
    
        <a class="acciones" href="/animales/{{$animal->id}}">Mostrar</a>
       
            <form action="/animales/{{$animal->id}}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="acciones" type="submit">Eliminar</button>
            </form>
     
        
        </td>
        </tr>
    @empty
        <tr>
        <td colspan="3">sin registros</td>
        </tr>
    @endforelse
</tbody>
    </table>
    </center>
</body>
</html>