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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuario</title>
</head>
<body>
    <center>
    <section class="trabajador-create">
        <div class="box">
        <div class="trabajador-container">
            <form action="/usuarios/{{$usuario->id}}" method="POST" class="trabajador-form">
                @csrf
                @method('PUT')
               <br> <input type="text" name="nombre" value="{{$usuario->nombre}}"><br>
               <br> <input type="text" name="apellidos" value="{{$usuario->apellidos}}"><br>
               <br><input type="password" name="contrasena"><br>
               <br><input type="password" name="contrasena_conf"><br>
               <br><input type="text" name="telefono" value="{{$usuario->telefono}}"><br>
               <br><select name="rol" id="">
                    <option value="{{$usuario->rol}}">{{$usuario->rol}}</option>
                    <option value="Veterinario">Veterinario</option>
                    <option value="Trabajador">Trabajador</option>
                    <br></select>
                    <br><button  class="regreso" type="submit">Actualizar</button>
                <a href="/usuarios" class="regreso"><span class="fas fa-long-arrow-alt-left"></span> Regresar</a>
            </form>
        </div>
         </div>
    </section>
</center>
</body>
</html>

