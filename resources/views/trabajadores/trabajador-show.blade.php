<style>
    li{
        list-style: none;
      
    }
    ul{
        display: flex;
        padding: 5px
    }
    .item_selected{
        color: rgb(255, 255, 255);
        font-size: 18px;
       
    }
    .content_bread{
        background-color: rgba(7, 7, 7, 0.39);
        margin-top: 0;
        margin-bottom: 5px;
    }
</style>
<div class="content_bread">
    <ul>
        
        <li class="item_selected">Usuarios > </li>
        <li class="item_selected">Ver usuarios</li>
    </ul>
</div>

<style>
    #lbCategoria{
        color: white;
    }
    #lu_c{
        list-style: none
    }
</style>

  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar</title>
</head>
<body>
    <lu id="lu_c">
        <center>
        <br><br> <li><label class="" id="lbCategoria">Nombre del usuario: {{$usuario->nombre}}</label></li> <br><br>
        <li><label id="lbCategoria">Apellidos: {{$usuario->apellidos}}</label></li><br><br>
        <li><label id="lbCategoria">Telefono: {{$usuario->telefono}}</label></li><br><br>
        <li><label id="lbCategoria">Rol : {{$usuario->rol}}</label></li><br><br>
        <a class=regreso href="/usuarios">Regresar</a>
</center>
    </lu>
</body>
</html>