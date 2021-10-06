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
        <h2>Nombre:</h1><input type="text" name="nombre" value="{{$animales1->nombre}}">
        <h2>Fecha de nacimiento :</h1><input type="date" name="fechadena" value="{{$animales1->fecha_de_nacimiento}}"> 
        <h2>Padre:</h1><input type="text" name="padre"  value="{{$animales1->padre}}"> 
        </div>
    Sexo:   <select name="sexo" id="sexo" value="{{$animales1->sexo}}"> 
            <option >Elija uno</option>
            <option >Macho</option>
            <option >Hembra</option>
            </select><br><br>

        <h2>Arete:</h1><input id="correos" type="text" name="arete" value="{{$animales1->arete}}">
        <br>
        <h2>Peso al nacer:</h1><input id="correos" type="text" name="PesoNacer" value="{{$animales1->peso_al_nacer}}">
        <h2>Peso al destete:</h1><input id="correos" type="text" name="pesoDestete" value="{{$animales1->peso_al_destete}}">
        <h2>Madre:</h1><input id="correos" type="text" name="Madre" value="{{$animales1->madre}}">
        clasificacion:   <select name="sexo" id="sexo" value="{{$animales1->clasificacion}}"> 
            <option >Elija uno</option>
            <option >Toro</option>
            <option >Vaca</option>
            <option >Becerro</option>
            </select><br><br>
        <br><br>
        <h2>Imagen:</h1><input type="file" name="imagen" accept="image/*" value="{{$animales1->imagen}}">
        @error('imagen') <small>{{$message}}</small> @enderror <br>
        
        <input class="btn" type="submit" value="Actualizar">
    </form>
    </div>
    </center>
</body>
</html>