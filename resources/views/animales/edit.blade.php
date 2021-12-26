<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <title></title>
   
</head>

<body class="cuerpo">



<div class="content_bread">
    <ul>
        
        <li class="item_selected">Animales > </li>
        <li class="item_selected">Editar Animal</li>
    </ul>
</div>
<center>
    <div class="box">
    <form action="/animales/{{$animales1->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h3>Nombre:</h3><input type="text" name="nombre" value="{{$animales1->nombre}}">
        <h3>Fecha de nacimiento :</h2><input type="date" name="fecha_de_nacimiento" value="{{$animales1->fecha_de_nacimiento}}"> 
        <h3>Padre:</h3><input type="text" name="padre"  value="{{$animales1->padre}}"> 
       
   
        <h3>Arete:</h3><input id="correos" type="text" name="arete" value="{{$animales1->arete}}">
        <br>
        <h3>Peso al nacer:</h3><input id="correos" type="text" name="peso_al_nacer" value="{{$animales1->peso_al_nacer}}">
        <h3>Peso al destete:</h3><input id="correos" type="text" name="peso_al_destete" value="{{$animales1->peso_al_destete}}">
        <h3>Madre:</h3><input id="correos" type="text" name="madre" value="{{$animales1->madre}}"> <br><br>
        Sexo:   <select name="clasificacion" id="sexo" value="{{$animales1->sexo}}"> 
            <option >{{$animales1->sexo}}</option>
            <option >Macho</option>
            <option >Hembra</option>
           
            </select>
     
        <h3>Imagen:</h3><img src="{{$animales1->imagen}}" width="250px"height="150px"><input type="file" name="imagen" value="{{$animales1->imagen}}">
         <br>
        
        <input class="regreso" type="submit" value="Actualizar">
        <a href="/animales" class="regreso"><span class="fas fa-long-arrow-alt-left"></span> Regresar</a>
    </form>
</center>
  
</body>
</html>