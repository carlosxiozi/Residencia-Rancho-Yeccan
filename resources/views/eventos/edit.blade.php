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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
  
    <title></title>
   
</head>

<body class="cuerpo">
    <center>
    <div  class="container-fluid mt-5 row mx-auto">
    <form   style="background: white !important" class="row col-xs col-sm col-md col-xl-5 shadow p-2 mx-auto" 
    action="/eventos/{{$eventos1->id}}" method="post" enctype="multipart/form-data">
        
        @csrf
        <a href="/eventos" class="btn btn-info"><span class="fas fa-long-arrow-alt-left"></span> Regresar</a>
        <div class="row p-2 mx-auto">
        @method('PUT')
        
        <div class="input-group mb-3">
            <span class="input-group-text">Nombre del evento </span>
            <input class="form-control" type="text" name="nombre" value="{{$eventos1->nombre_evento}}">
        </div>
        <div class="input-group mb-3">
            
            <span class="input-group-text"> Fecha Inicial  </span>
         <input  class="form-control" type="date" name = "fecha_inicio" value="{{$eventos1->fecha_inicial}}">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text"> Fecha de terminación  </span>
        <input  class="form-control" type="date" name = "fecha_final" value="{{$eventos1->fecha_final}}">
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text"> Descripción  </span>
        <textarea  class="form-control"name="descripcion"  cols="20" rows="10"   >{{$eventos1->descripcion}}</textarea><br><br>
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text"> Tipo de vento:</span><select name="tipo" id="tipo" value="{{ $eventos1->tipo }}">
                <option>{{ $eventos1->tipo }}</option>
                <option>General</option>
                <option>Individual</option>
            </select>
          
        </select>

    </div>

    <div class="input-group mb-3">
        
        <span class="input-group-text"> Descripción  </span>
        <textarea  class="form-control"name="nota"  cols="20" rows="10"   >{{$eventos1->nota}}</textarea><br><br>

    </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Actualizar">
    </form>
    </div>
    </center>
</body>
</html>