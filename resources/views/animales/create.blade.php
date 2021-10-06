<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_animals.css') }}">
    <title></title>
   
</head>

<body class="cuerpo">
    <center>
    <div class="box">
    <form action="/animales" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Nombre:</h1><input type="text" name="nombre">
       <input type="date" name = "fecha_de_nacimiento">
        <h1>Padre:</h1><input type="text" name="padre"> 
        </div>
    Sexo:   <select name="sexo" id="sexo"> 
            <option >Elija uno</option>
            <option >Macho</option>
            <option >Hembra</option>
            </select><br><br>

        <h1>Arete:</h1><input id="correos" type="text" name="arete">
        <br>
        <h1>Peso al nacer:</h1><input id="correos" type="text" name="peso_al_nacer">
        <h1>Peso al destete:</h1><input id="correos" type="text" name="peso_al_destete">
        <h1>Madre:</h1><input id="correos" type="text" name="madre">
        clasificacion:   <select name="clasificacion" id="clasificacion"> 
            <option >Elija uno</option>
            <option >Toro</option>
            <option >Vaca</option>
            <option >Becerro</option>
            </select><br><br>
        <br><br>
        <h1>Imagen:</h1><input type="file" name="imagen" accept="image/*">
        @error('imagen') <small>{{$message}}</small> @enderror <br>
        
        <input class="btn" type="submit" value="Agregar">
    </form>
    </div>
    </center>
</body>
</html>