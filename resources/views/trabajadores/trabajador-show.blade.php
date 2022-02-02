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
    <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar</title>
</head>
<body>
    <div class="container-fluid mt-5 row mx-auto">
        <div style="background: white !important" class="row col-xs col-sm col-md col-xl-6 shadow p-2 mx-auto">
            <a href="/usuarios" class="btn btn-info"><span class="fas fa-long-arrow-alt-left"></span> Regresar</a>
            <div class="input-group mb-3">
                <span class="input-group-text">Nombre del usuario</span>
                <span class="form-control"> {{$usuario->nombre}}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Apellidos</span>
                <span class="form-control"> {{$usuario->apellidos}}</span>
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text">Telefono</span>
                <span class="form-control"> {{$usuario->telefono}}</span>
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text">Rol</span>
                <span class="form-control"> {{$usuario->rol}}</span>
            </div>
        
       

        
    </div>
</div>
</body>
</html>